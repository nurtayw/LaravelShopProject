@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <form class="form-check mt-3" action="{{route('adm.shops.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
            <button class="btn btn-success">{{__('messages.search')}}</button>
        </div>
    </form>
    <h1>Product List</h1>
    <a class="btn btn-outline-success mt-5" href="{{route('adm.shops.create')}}">{{__('messages.add')}}</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.name')}}</th>
            <th scope="col">{{__('messages.price')}}</th>
            <th scope="col">{{__('messages.brand')}}</th>
            <th scope="col">{{__('messages.category')}}</th>
            <th scope="col">{{__('buttons.edit')}}</th>
            <th scope="col">{{__('buttons.delete')}}</th>
        </tr>
        </thead>
        <tbody>
            @for($i=0; $i<count($products); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$products[$i]->name}}</td>
                    <td>{{$products[$i]->price}}</td>
                    <td>{{$products[$i]->manufacturer->country}}</td>
                    <td>{{$products[$i]->category->name}}</td>
                    <td>
                      <a href="{{route('adm.shops.edit', $products[$i]->id)}}" class="btn btn-success">{{__('buttons.edit')}}</a>
                    </td>
                    <td>
                        <form style="margin-top: -4px" action="{{route('adm.shops.destroy', $products[$i]->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="flex-sm-row btn btn-danger mt-1" type="submit">{{__('buttons.delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
@endsection
