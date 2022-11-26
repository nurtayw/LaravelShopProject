@extends('layouts.app')

@section('title', 'CART')

@section('content')
    <h1 class="align-items-center">Your Cart</h1>
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <div class="row">
            @foreach($cart as $shop)
                <div class="card mt-3 col-lg-3 m-lg-3" style="background: white">
                    <div class="card-header" style="background: white">
                        <div class="card-body">
                            <img src="{{asset($shop->image)}}" class="card-img-top" alt="" style="margin: fill; width: 230px; height: 200px;">
                            <h5 class="card-title">{{ $shop->name }}</h5>
                            <p class="card-text">{{ $shop->price }} $</p>
                            <form class="form-check" action="{{route('cart.buy')}}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Buy</button>
                            </form>
                            <form class="form-check" action="{{route('shops.uncart', $shop->id)}}" method="post" style="margin-left: 67px; margin-top: -39px">
                                @csrf
                                <button class="btn btn-outline-dark" type="submit">X</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
