
<nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm" style="">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
{{--            {{ config('app.name', 'CRM Motor ') }}--}}
            CRM Motor
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link">About Us </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/service') }}" class="nav-link">Service </a>
                </li>
                <li class="nav-item">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a href="{{ route('product.index') }}" class="nav-link">Product </a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Product</a>
                    @endif
                </li>
                @guest
                @else
                    @if(Auth::user()->role === 'admin')
                        <li>
                            <a href="{{ route('order.edit') }}" class="nav-link">Edit Order </a>
                        </li>
                        <li>
                            <a href="{{ route('product.create') }}" class="nav-link">Add Product </a>
                        </li>
                    @endif
                @endguest

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item" style="align-self: center">
                        <a href="{{ route('order.index',['user_id' => \Illuminate\Support\Facades\Auth::id() ]) }}" >
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role === 'user')

                                    <a href="{{ route('order.index',['user_id' => \Illuminate\Support\Facades\Auth::id() ]) }}" class="dropdown-item">
                                        <i class="fas fa-shopping-cart"></i>
                                     Your Cart
                                    </a>
                                @endif
                                <a class="dropdown-item" style="color: red" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </li>



                @endguest
            </ul>
        </div>
    </div>
</nav>


