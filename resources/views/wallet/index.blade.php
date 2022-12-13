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
                <tr>
                    <td>
                        {{Auth::user()->money}}
                    </td>
            <tr>
            </tbody>
        </table>
    </div>
@endsection
