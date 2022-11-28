@extends('layouts.app')

@section('title', 'MAIN  PAGE')

@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <div class="row" style="background: white">
            @foreach($shops as $shop)
                <div class="card mt-3 col-lg-3 m-lg-3" style="background: white">
                    <div class="card-header" style="background: white">
                        <div class="card-body">
                            <img src="{{asset($shop->image)}}" class="card-img-top" alt="" style="width: 230px; height: 200px; margin-left: -30px;">
                            <h5 class="card-title">{{ $shop->name }}</h5>
                            <p class="card-text">{{ $shop->price }} $</p>
                            <a href="{{ route('shops.show', $shop->id) }}" class="flex-sm-row btn " style="background: #000000; color: white">Choose</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
