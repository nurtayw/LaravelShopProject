@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')
    <style>
        .page_404 {
            margin-left: 200px;
            margin-top: 100px;
            width: 900px;
            padding: 40px 0;
            background: #fff;
            font-family: "Arvo", serif;
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {
            background-image: url({{asset('https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif')}});
            height: 400px;
            background-position: center;
        }

        .four_zero_four_bg h1 {
            font-size: 80px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
        }
        .contant_box_404 {
            margin-top: -50px;
        }
    </style>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>
                        </div>
                        <div class="contant_box_404">
                            <h3 class="h2">
                                Look like you're lost
                            </h3>
                            <p>the page you are looking for not available!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
