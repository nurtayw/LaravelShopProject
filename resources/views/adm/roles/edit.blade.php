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
        <div class="row justify-content-center" style="margin-left: 400px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('adm.roles.update', $role->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Name</label>
                        <input type="text" value="{{$role->name}}" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name">
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
