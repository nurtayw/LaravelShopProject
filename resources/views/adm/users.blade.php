@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <form class="form-check mt-3" action="{{route('adm.users.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
            <button class="btn btn-success">Search</button>
        </div>
    </form>

    <h1>Users</h1>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Active</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
    </thead>
        <tbody>
        @for($i=0; $i<count($users); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                <td>{{$users[$i]->role->name}}</td>
                <td>
                    <form action="
                      @if($users[$i]->is_active)
                                {{route('adm.users.ban', $users[$i]->id)}}
                            @else
                                 {{route('adm.users.unban',$users[$i]->id)}}
                            @endif
                    " method="post">
                        @csrf
                        @method('PUT')
                        <button style="width: 80px;" class="btn {{$users[$i]->is_active ? 'btn-danger' : 'btn-success'}}" type="submit">
                            @if($users[$i]->is_active)
                                Ban
                            @else
                                Unban
                            @endif
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{route('adm.users.edit', $users[$i]->id)}}" class="btn btn-success">EDIT</a>
                </td>
                <td>
                   <form action="{{route('adm.users.destroy', $users[$i]->id)}} " method="post">
                       @csrf
                       @method('DELETE')
                        <button class="btn btn-danger" type="submit">DELETE</button>
                   </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
