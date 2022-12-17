@extends('layouts.app')

@section('title', 'CART')

@section('content')
    <h1 class="align-items-center" style="margin-left: 400px">{{__('messages.u_cart')}}</h1>
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <div class="row">
            <form class="form-check" action="{{route('cart.buy')}}" method="post">
                @csrf
                <button onclick="return alert('Do you wanna buy?')" class="btn btn-success" type="submit" style="width: 150px; margin-left: -20px">{{__('messages.buy')}}</button>
            </form>
            @foreach($cart as $shop)
                <div class="card mt-3 col-lg-3 m-lg-3" style="background: white">
                    <div class="card-header" style="background: white">
                        <div class="card-body">
                            <img src="{{asset($shop->image)}}" class="card-img-top" alt="" style="margin: fill; width: 230px; height: 200px;">
                            <h5 class="card-title">{{ $shop->{'name_'.app()->getLocale()} }}</h5>
                            <p class="card-text">{{ $shop->price }} $</p>
                            <p><b>#{{$shop->pivot->quantity}}</b></p>
                            <form class="form-check" action="{{route('shops.uncart', $shop->id)}}" method="post" style="margin-left: 160px; margin-top: -20px">
                                @csrf
                                <button class="btn btn-outline-dark" onclick="return confirm('Are you sure?')" type="submit">X</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
