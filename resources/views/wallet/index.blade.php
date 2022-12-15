@extends('layouts.app')
@section('title', 'MAIN  PAGE')
@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <a href="{{route('wallet.create')}}" class="btn btn-outline-success">{{__('messages.replenish')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('messages.money')}}</th>
                <th>{{__('messages.replenish')}}</th>
                <th>{{__('buttons.delete')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($wallet as $u)
                @if($u->user_id == Auth::user()->id)
                <tr>
                    <td>
                        {{$u->money}}
                    </td>
                    <td>
                        <a href="{{route('wallet.edit', $u->id)}}" class="btn btn-success">{{__('messages.replenish')}}</a>
                    </td>
                    <td>
                        <form action="{{route('wallet.destroy', $u->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{__('buttons.delete')}}</button>
                        </form>
                    </td>
                <tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
