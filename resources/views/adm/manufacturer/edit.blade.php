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
                        <label for="titleInput">Brand</label>
                        <input type="text" value="{{$manufacturer->brand}}" class="form-control @error('brand') is-invalid @enderror" id="nameInput" name="brand">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Brand</label>
                        <input type="text" value="{{$manufacturer->brand_kz}}" class="form-control @error('brand_kz') is-invalid @enderror" id="nameInput" name="brand_kz">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Brand</label>
                        <input type="text" value="{{$manufacturer->brand_ru}}" class="form-control @error('brand_ru') is-invalid @enderror" id="nameInput" name="brand_ru">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Brand</label>
                        <input type="text" value="{{$manufacturer->brand_en}}" class="form-control @error('brand_en') is-invalid @enderror" id="nameInput" name="brand_en">
                        <div class="invalid-feedback"></div>
                    </div><div class="form-group" style="width: 330px">
                        <label for="titleInput">Brand</label>
                        <input type="text" value="{{$manufacturer->brand_ita}}" class="form-control @error('brand_ita') is-invalid @enderror" id="nameInput" name="brand_ita">
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
