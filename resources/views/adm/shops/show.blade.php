@extends('layouts.app')

@section('title', 'SHOW PAGE')

@section('content')
    <div class="container" style="margin-left: 120px; margin-top: 80px;">
        <div class="justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3" style="background:#ffffff; border: 1px solid black; border-radius: 10px">
                    <div class="card-header">
                        <div class="card-body justify-content-center">
                            <table>
                                <tr>
                                    <td>
                                        <img src="{{asset($shop->image)}}" class="card-img-top" alt="" style="width: 250px; height: 250px;">
                                    </td>
                                    <td style="padding-left: 50px">
                                        <h5 class="card-title">{{ __('messages.name') }}: {{ $shop->{'name_'.app()->getLocale()} }}</h5>
                                        <p class="card-text">{{ __('messages.price') }}: {{$shop->price }} $</p>
                                        <p class="card-text">{{ __('messages.size') }}: {{$shop->size }}</p>
                                        <p class="card-text">{{ __('messages.manufacturer') }}: {{ $shop->{'mname_'.app()->getLocale()} }}</p>
                                        <p class="card-text">{{ __('messages.description') }}: {{ $shop->{'description_'.app()->getLocale()} }}</p>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <form action="{{route('shops.cart', $shop->id)}}" style="" method="post">
                                @csrf
                                <select name="color" style="height: 30px; border-radius: 5px;">
                                    <option value="Black">{{__('buttons.black')}}</option>
                                    <option value="Blue">{{__('buttons.blue')}}</option>
                                    <option value="White">{{__('buttons.white')}}</option>
                                </select>
                                <input type="number" name="quantity" placeholder="1" style="width: 50px">
                                <button class="btn btn-outline-dark" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    {{__('buttons.cart')}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <form style="margin-top: 10px;" action="{{route('comments.store')}}" method="post">
                    @csrf
                    <textarea style="width: 700px; border-style: outset" name="content" rows="2" cols="30" placeholder="{{__('messages.entr_cmt')}}"></textarea>
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button style="margin-left: 20px; margin-top: -40px" type="submit" class="btn btn-outline-dark">✓</button>
                </form>
                <ul class="list-group mt-3">
                    @foreach($shop->comments as $comment)
                        <li class="list-group-item d-flex justify-content-between align-items-start" style="width: 700px; margin-top: 5px">
                                <small>{{__('messages.author')}}: <span style="color: #1a202c; font-size: 16px;">{{$comment->user->name}}</span></small>
                                <small style="margin-right: 300px"><span style="color: #1a202c; font-size: 16px;">{{__('messages.comment')}}: {{$comment->content}}</span></small>
                        </li>
                        @can('delete', $comment)
                            <form action="{{route('comments.destroy', $comment->id)}}" method="post" style="margin-top: -50px; margin-left: 728px">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  onclick="return confirm('Are you sure?')" class="btn btn-outline-dark">X</button>
                            </form>
                        @endcan
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection



