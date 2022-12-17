@extends('layouts.admin')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 250px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('adm.manufacturer.store')}}" method="post">
                    @csrf
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Brand</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="nameInput" name="brand">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Brand KZ</label>
                        <input type="text" class="form-control @error('brand_kz') is-invalid @enderror" id="nameInput" name="brand_kz">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Brand RU</label>
                        <input type="text" class="form-control @error('brand_ru') is-invalid @enderror" id="nameInput" name="brand_ru">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Brand EN</label>
                        <input type="text" class="form-control @error('brand_en') is-invalid @enderror" id="nameInput" name="brand_en">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Brand ITA</label>
                        <input type="text" class="form-control @error('brand_ita') is-invalid @enderror" id="nameInput" name="brand_ita">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" type="submit">{{__('messages.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
