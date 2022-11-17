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
                                        <img src="{{$shop->image}}" class="card-img-top" alt="" style="width: 250px; height: 250px;">
                                    </td>
                                    <td style="padding-left: 50px">
                                        <h5 class="card-title">Name: {{$shop->name }}</h5>
                                        <p class="card-text">Price: {{$shop->price }} $</p>
                                        <p class="card-text">Size: {{$shop->size }}</p>
                                        <p class="card-text">Manufacturer: {{$shop->manufacturer->country}}</p>
                                        <p class="card-text">Description: {{$shop->description }}</p>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <form action="{{route('basket.index')}}" class="" style="margin-left: 700px">
                                <button class="btn btn-outline-dark" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Cart
                                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                                </button>
                            </form>
                            @auth()
                                <div style="margin-top: -40px">
                                    <form action="{{route('shops.rate', $shop->id)}}" method="post">
                                        @csrf
                                        <select name="rating" style="width: 93px; border:1px solid black; border-radius: 5px; height: 35px">
                                            @for($i=0; $i<=5; $i++)
                                                <option {{{$MyRating==$i ? 'selected' : ''}}} value="{{$i}}">
                                                    {{$i==0 ? 'Not rated' : $i}}
                                                </option>
                                            @endfor
                                        </select>
                                        <button type="submit" class="btn btn-warning">Rate</button>
                                    </form>
                                    <form action="{{route('shops.unrate', $shop->id)}}" method="post" style="margin-left: 160px; margin-top: -38px">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Unrate</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>

                @if($avgRating != 0)
                    <h3>Rate {{ $avgRating }}</h3>
                @endif
                <form style="margin-top: 10px;" action="{{route('comments.store')}}" method="post">
                    @csrf
                    <textarea style="width: 800px;" name="content" rows="2" cols="30" placeholder="Enter comment"></textarea>
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button style="margin-left: 20px; margin-top: -40px" type="submit" class="btn btn-success">Save</button>
                </form>
                <ul class="list-group mt-3">
                    @foreach($shop->comments as $comment)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                            <small>author: <span style="color: #1a202c; font-size: 16px;">{{$comment->user->name}}</span></small>
                            <p>{{$comment->content}}</p>
                            @can('delete', $comment)
                                <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endcan
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection



