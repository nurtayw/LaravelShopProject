@extends('layouts.app')
@section('title', 'MAIN  PAGE')
@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <div class="row" style="background: white">
                <div class="card mt-3 col-lg-3 m-lg-3" style="background: white">
                    <div class="card-header" style="background: white">
                        <div class="card-body">
                            <h5 class="card-title">{{Auth::user()->name }}</h5>
                            <p class="card-text">{{Auth::user()->email }}</p>
                            <a class="btn btn-outline-primary" href="{{route('users.edit', Auth::user()->id)}}">Edit</a>
                            <form action="{{route('users.destroy',Auth::user()->id )}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn-outline-danger">Delete my account</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
