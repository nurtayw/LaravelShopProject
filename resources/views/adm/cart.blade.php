@extends('layouts.admin')

@section('title', 'Cart')

@section('content')

    <h1>Users</h1>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.name')}}</th>
            <th scope="col">{{__('messages.user')}}</th>
            <th scope="col">{{__('messages.color')}}</th>
            <th scope="col">{{__('messages.quantity')}}</th>
            <th scope="col">{{__('messages.status')}}</th>
            <th scope="col">{{__('messages.confirm')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($cart); $i++)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$cart[$i]->shop->name}}</td>
                <td>{{$cart[$i]->user->name}}</td>
                <td>{{$cart[$i]->color}}</td>
                <td>{{$cart[$i]->quantity}}</td>
                <td>{{$cart[$i]->status}}</td>
                <td>
                    <form action="{{route('adm.cart.confirm', $cart[$i]->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success" type="submit">{{__('messages.confirm')}}</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
