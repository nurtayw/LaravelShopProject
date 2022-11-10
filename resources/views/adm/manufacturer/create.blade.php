@extends('layouts.admin')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 250px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('adm.manufacturer.store')}}" method="post">
                    @csrf
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Country</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="nameInput" name="country" placeholder="Country name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="nameInput" name="code" placeholder="Country code">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
