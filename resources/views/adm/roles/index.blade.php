@extends('layouts.admin')

@section('title', 'MAIN  PAGE')

@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <a href="{{route('adm.roles.create')}}" class="btn btn-outline-success">Add</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>
                        {{$role->name}}
                    </td>
                    <td>
                        <form action="{{route('adm.roles.destroy',$role->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
            </tbody>
        </table>
    </div>
@endsection
