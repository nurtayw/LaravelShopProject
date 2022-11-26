@extends('layouts.admin')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 200px;">
            <div class="col-md-10">
                <form action="{{ route('adm.shops.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-5" style="width: 330px">
                        <label for="titleInput">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">Price</label>
                        <input type="number" class="form-control  @error('price') is-invalid @enderror" id="priceInput" name="price" placeholder="Enter price">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">Size</label>
                        <input type="number" class="form-control  @error('size') is-invalid @enderror" id="sizeInput" name="size" placeholder="Enter size">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="contentGroup">Description</label>
                        <textarea type="text" class="form-control  @error('description') is-invalid @enderror" id="descriptionInput" name="description" placeholder="Enter description"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="imageGroup">Image</label>
                        <input type="file" class="form-control  @error('image') is-invalid @enderror" id="imageInput" name="image" placeholder="Enter URL">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="categoryGroup">Manufacturer</label>
                        <select class="form-control  @error('manufacturer_id') is-invalid @enderror" name="manufacturer_id" id="manufacturerGroup">
                            @foreach($manufacturer as $mnr)
                                <option value="{{$mnr->id}}">{{ $mnr->country }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="categoryGroup">Category</label>
                        <select class="form-control  @error('category_id') is-invalid @enderror" name="category_id" id="categoryGroup">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
