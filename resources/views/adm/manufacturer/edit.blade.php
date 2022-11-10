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
        <div class="row justify-content-center" style="margin-left: 300px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('adm.manufacturer.update', $manufacturer->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Country</label>
                        <input type="text" value="{{$manufacturer->country}}" class="form-control @error('country') is-invalid @enderror" id="nameInput" name="country">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Code</label>
                        <input type="text" value="{{$manufacturer->code}}" class="form-control @error('code') is-invalid @enderror" id="nameInput" name="code">
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
