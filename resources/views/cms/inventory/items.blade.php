@extends('layouts.app')

@section('content')

@include('navbar.inventory')
    <div class="col-lg-12 p-3">
        <div class="row">
            <div class="col-4">
                <div class="h3">Inventory</div>
            </div>
            <div class="col-8 text-right">
                <a class="btn btn-success text-light" href="/inventory/new/">+ Add New Item</a>
            </div>
        </div>
        <hr>
        <div class="p-3 bg-light border rounded row m-1">
            <div class="h5 col-12">Search Inventory Items</div>
            {{Form::label('search',null,['class'=>'col-lg-1 pt-1'])}}
            {{Form::text('search',null,['class'=>'form-control col-lg-9 mb-2','placeholder'=>'Search Name'])}}
            {{Form::submit('Search',['class'=>'btn btn-outline-primary col-lg-1 ml-lg-2 mb-2'])}}
        </div>

        <div class="p-3 bg-light border rounded row m-1 mt-3">
            @foreach($items as $item)
            <div class="card-deck col-lg-3">
                <div class="card">
                <img class="card-img-top pt-3" src="storage/inventory/{{$item->image}}" alt="Card image cap" style="width:150px;height:150px;display:block;margin:auto;">
                  <div class="card-body">
                  <h5 class="card-title text-center">{{$item->name}}</h5>
                  <p class="card-text text-justify">{{$item->description}}</p>
                  <p class="card-text text-center font-weight-bold text-success">LKR {{$item->price}}</p>
                  </div>
                  <div class="card-footer">
                  <small class="text-muted">{{Helper::time_elapsed_string($item->updated_at)}}</small>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection