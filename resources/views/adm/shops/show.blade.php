@extends('layouts.app')

@section('title', 'SHOW PAGE')

@section('content')
    <div class="container" style="margin-left: 120px; margin-top: 80px">
        <div class="justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
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
                            <form class="" style="margin-left: 700px">
                                <button class="btn btn-outline-dark" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Cart
                                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                                </button>
                            </form>
                        </div>
                        <hr>
                    </div>
                </div>
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



