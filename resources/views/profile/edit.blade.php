@extends('layouts.app')

@section('title', 'Cart')

@section('content')

    <div class="container">
        <div class="row justify-content-center" style="margin-left: 350px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('profile.update', $profile->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <input type="hidden" name="id" value="{{$profile->id}}">

                    <div class="form-group" style="width: 330px">
                        <label for="titleinput">{{__('messages.name')}}</label>
                        <input type="text" value="{{$profile->name}}" class="form-control @error('name') is-invalid @enderror" id="nameinput" name="name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleinput">{{__('messages.email')}}</label>
                        <input type="text" value="{{$profile->email}}" class="form-control @error('email') is-invalid @enderror" id="emailinput" name="email">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleinput">{{__('messages.image')}}</label>
                        <input type="file" value="{{$profile->image}}" class="form-control @error('image') is-invalid @enderror" id="imageinput" name="image">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">{{__('buttons.update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
