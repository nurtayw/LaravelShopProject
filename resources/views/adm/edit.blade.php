@extends('layouts.admin')

@section('title', 'EDIT PAGE')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center" style="margin-left: 250px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('adm.users.update', $user->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Name</label>
                        <input readonly type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="imageGroup">Email</label>
                        <input readonly type="email" value="{{$user->email}}" class="form-control  @error('email') is-invalid @enderror" id="emailInput" name="email">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3" style="width: 330px">
                        <label for="RoleGroup">Role</label>
                        <select class="form-control" name="role_id">
                            @foreach($roles as $role)
                                <option @if($role->id == $user->role_id) selected @endif value="{{$role->id}}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
