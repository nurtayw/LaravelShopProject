@extends('layouts.app')
@section('title', 'MAIN  PAGE')
@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <a href="{{route('wallet.create')}}" class="btn btn-outline-success">Add</a>
        <table class="table">
            <thead>
            <tr>
                <th>Money</th>
            </tr>
            </thead>
            <tbody>
            @foreach($wallet as $w)
                <tr>
                    <td>
                        {{$w->user->money}}
                    </td>
            <tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
