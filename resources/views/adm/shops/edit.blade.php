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
        <div class="row justify-content-center" style="margin-left: 200px;">
            <div class="col-md-10">
                <form action="{{ route('adm.shops.update', $shop->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{__('messages.name')}}</label>
                        <input type="text" value="{{$shop->name}}" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{__('messages.name')}} KZ</label>
                        <input type="text" value="{{$shop->name_kz}}" class="form-control @error('name_kz') is-invalid @enderror" id="nameInput" name="name_kz" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{__('messages.name')}} RU</label>
                        <input type="text" value="{{$shop->name_ru}}" class="form-control @error('name_ru') is-invalid @enderror" id="nameInput" name="name_ru" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{__('messages.name')}} EN</label>
                        <input type="text" value="{{$shop->name_en}}" class="form-control @error('name_en') is-invalid @enderror" id="nameInput" name="name_en" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{__('messages.name')}} ITA</label>
                        <input type="text" value="{{$shop->name_ita}}" class="form-control @error('name_ita') is-invalid @enderror" id="nameInput" name="name_ita" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">{{__('messages.price')}}</label>
                        <input type="number" value="{{ $shop->price}}" class="form-control"  name="price" placeholder="">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">{{__('messages.size')}}</label>
                        <input type="number" value="{{ $shop->size}}" class="form-control"  name="size" placeholder="">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">{{__('messages.description')}}</label>
                        <input type="text" value="{{$shop->description}}" class="form-control"  name="description" placeholder="">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">{{__('messages.description')}} KZ</label>
                        <input type="text" value="{{$shop->description_kz}}" class="form-control  @error('description_kz') is-invalid @enderror" id="descriptionInput" name="description_kz" placeholder="Enter description"></input>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">{{__('messages.description')}} EN</label>
                        <input type="text" value="{{$shop->description_en}}" class="form-control  @error('description_en') is-invalid @enderror" id="descriptionInput" name="description_en" placeholder="Enter description">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">{{__('messages.description')}} RU</label>
                        <input type="text" value="{{$shop->description_ru}}" class="form-control  @error('description_ru') is-invalid @enderror" id="descriptionInput" name="description_ru" placeholder="Enter description">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">{{__('messages.description')}} ITA</label>
                        <input type="text" value="{{$shop->description_ita}}" class="form-control  @error('description_ita') is-invalid @enderror" id="descriptionInput" name="description_ita" placeholder="Enter description">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="imageGroup">{{__('messages.image')}}</label>
                        <input type="file" value="{{$shop->image}}" class="form-control  @error('image') is-invalid @enderror" id="imageInput" name="image" placeholder="Enter URL">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3" style="width: 330px">
                        <label for="ManufacturerGroup">{{__('messages.brand')}}</label>
                        <select class="form-control" name="manufacturer_id">
                            @foreach($manufacturer as $mct)
                                <option @if($mct->id == $shop->manufacturer_id) selected @endif value="{{$mct->id}}">{{ $mct->brand }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3" style="width: 330px">
                        <label for="CategoryGroup">{{__('messages.category')}}</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $cat)
                                <option @if($cat->id == $shop->category_id) selected @endif value="{{$cat->id}}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
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
