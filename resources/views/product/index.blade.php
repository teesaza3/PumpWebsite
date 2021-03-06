@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">

                <div id="list-example" class="list-group">
                    <a class="list-group-item list-group-item-action card-header active" >Products</a>
                    @foreach($products as $product)
                        <a class=" shadow-sm  list-group-item list-group-item-action" href="{{ route('product.index',['type_id' => $product->type]) }}">{{ $product->type }}</a>

                    @endforeach

                </div>

            </div>
            <div class="col-8">
                <div class="row ">
                    <div class="card-columns">
                        @foreach($types as $type)
                        <div class=" shadow card border-dark mb-3 "  name="cardProduct" style="width: 18rem;">
                            <img class="card-img-top" style="height: 13rem" src="{{asset( $type->img )}}" alt="Card image cap">
                            <div class="card-body text-xl-center">
                                <h5 class="card-title ">{{ $type->name }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
{{--                                <li class="list-group-item">Price : {{ $type->price }}--}}
{{--                                </li>--}}
                            </ul>
                            <div class="card-body text-xl-center">
                                <a href="{{ route('product.show',['product_id' => $type->id]) }}">
                                    <button name="showDetailBtn" type="button" class="btn btn-outline-primary">Show detail</button>
                                </a>
                                @if(Auth::user()->role === 'user')
                                <a>
                                    <button  name="addBtn" type="button" class="btn btn-outline-success"
                                            data-name="{{ $type->name }}"
                                            data-pid="{{ $type->id }}"
                                            data-toggle="modal" data-target="#cart">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </a>
                                @else
                                    <a href="{{ route('product.show.edit',['product_id' => $type->id]) }}">
                                        <button type="submit"  name="orderBtn" class="btn btn-outline-success"><i class="fas fa-edit"></i> Edit</button>
                                    </a>

                                @endif


                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
    <!-- Modal -->
        <div class="modal fade" id="cart" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <input type="text" id="i1" name="i1" hidden>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input  id="p_id" name="p_id" hidden>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Amount</span>
                            </div>
                            <input type="number" min="1" max="50" name="amount"  id="amount" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text">unit</span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button name="closeBtn"type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="submitBtn"type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>




@endsection
