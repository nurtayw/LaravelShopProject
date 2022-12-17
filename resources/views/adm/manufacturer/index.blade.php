@extends('layouts.admin')

@section('title', 'MAIN  PAGE')

@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <a href="{{route('adm.manufacturer.create')}}" class="btn btn-outline-success">{{__('messages.add')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('messages.brand')}}</th>
                <th>{{__('buttons.edit')}}</th>
                <th>{{__('buttons.delete')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($manufacturer as $mct)
                <tr>
                    <td>
                        {{$mct->brand}}
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{route('adm.manufacturer.edit', $mct->id)}}">{{__('buttons.edit')}}</a>
                    </td>
                    <td>
                        <form action="{{route('adm.manufacturer.destroy',$mct->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">{{__('buttons.delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
            </tbody>
        </table>
    </div>
@endsection

