@extends('layouts.app')

@section('content')

@include('navbar.farmer')


    <div class="col-lg-12 p-3">
    
        <div class="row">
            <div class="col-4">
                <div class="h3">Farmer</div>
            </div>
            <div class="col-8 text-right">
                <a class="btn btn-success text-light" href="/farmer/new/">+ Add New Farmer</a>
            </div>
        </div>
        <hr>
        <div class="p-3 bg-light border rounded row m-1 mt-3">
        </div>
    </div>
@endsection