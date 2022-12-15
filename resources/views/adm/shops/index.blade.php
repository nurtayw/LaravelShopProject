@extends('layouts.app')
@section('title', 'MAIN  PAGE')
@section('content')
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">{{__('messages.category')}}</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @isset($categories)
                                                        @foreach($categories as $cat)
                                                            <li>
                                                                <a
                                                                    href="{{ route('shops.category', $cat->id) }}">{{ $cat->{'name_'.app()->getLocale()} }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    @endisset
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">{{__('messages.brand')}}</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    @isset($manufacturer)
                                                        @foreach($manufacturer as $cat)
                                                            <li>
                                                                <a
                                                                    href="{{ route('shops.manufacturer', $cat->id) }}">{{ $cat->{'brand_'.app()->getLocale()} }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    @endisset
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row small">
                        <div class="card mt-3 col-4 m-lg-3">
                            <div class="product__item">
                                @foreach($shops as $shop)
                                <div class="product__item__pic set-bg"  style="margin-top: 20px">
                                    <img src="{{asset($shop->image)}}">
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $shop->{'name_'.app()->getLocale()} }}</h6>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>${{ $shop->price }}</h5>
                                </div>
                                    <a href="{{ route('shops.show', $shop->id) }}" class="flex-sm-row btn " style="background: #000000; color: white">{{__('buttons.choose')}}</a>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
