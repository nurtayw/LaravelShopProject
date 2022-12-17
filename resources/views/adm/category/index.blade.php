@extends('layouts.admin')

@section('title', 'MAIN  PAGE')

@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <a href="{{route('adm.category.create')}}" class="btn btn-outline-success">{{__('messages.add')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('messages.name')}}</th>
                <th>{{__('buttons.edit')}}</th>
                <th>{{__('buttons.delete')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>
                        {{$cat->name}}
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{route('adm.category.edit', $cat->id)}}">{{__('buttons.edit')}}</a>
                    </td>
                    <td>
                        <form action="{{route('adm.category.destroy',$cat->id)}}" method="post">
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
