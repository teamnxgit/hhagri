@extends('layouts.app')

@section('content')

@include('navbar.farmer')

    @can('Farmer Operator')
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

        {!! Form::open(['url' => '/farmers']) !!}
        <div class="p-3 bg-light border rounded row m-1">
            <div class="h5 col-12">Search Farmer</div>
            {{Form::label('search',null,['class'=>'col-lg-1 pt-1'])}}
            {{Form::text('keyword',$keyword,['class'=>'form-control col-lg-9 mb-2','placeholder'=>'Search by Farmer Code | NIC | Name'])}}
            {{Form::submit('Search',['class'=>'btn btn-primary col-lg-1 ml-lg-2 mb-2'])}}
        </div>
        {!! Form::close() !!}

        <div class="p-3 bg-light border rounded row m-1 mt-3">
            <div class="table-responsive">
                <table class="table">
                    <thead class="">
                        <tr>
                            <th>Farmer Code</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($farmers as $farmer)
                            <tr>
                                <td>{{$farmer->farmer_code}}</td>
                            <td><a href="farmer/{{$farmer->farmer_code}}">{{$farmer->full_name}}</a></td>
                                <td>
                                    @can('admin')
                                    {!! Form::open(['url' => '/farmer/rem']) !!}
                                        {!! Form::hidden('farmer_code', $farmer->farmer_code) !!}
                                        {!! Form::button('<i class="fas fa-trash"></i>', ['class'=>'btn btn-danger','type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endcan
@endsection