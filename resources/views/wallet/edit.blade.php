@extends('layouts.app')

@section('title', 'Cart')

@section('content')

    <div class="container">
        <div class="row justify-content-center" style="margin-left: 350px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('wallet.update', $wallet->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    <div class="form-group" style="width: 330px">
                        <label for="titleinput">{{__('messages.money')}}</label>
                        <label for="nameinput"></label>
                        <input type="text" value="{{$wallet->money}}" class="form-control @error('money') is-invalid @enderror" id="nameinput" name="money">
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
