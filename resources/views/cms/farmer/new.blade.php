@extends('layouts.app')

@section('content')

@include('navbar.farmer')
    <div class="col-lg-12 p-3">
        <div class="row">
            <div class="col-12">
                <div class="h3">New Grower</div>
            </div>
        </div>
        <hr>
        {!! Form::open(['url' => '/farmer/add']) !!}
        <div class="p-3 bg-light border rounded row m-1">
        
            <div class="h5 col-12">Enter the details to add new farmer</div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Farmer Code</label>
                </div>
                <input type="text" name="farmer_code" class="form-control">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text">Title</label>
                </div>
                <select class="custom-select" id="town" name="title">
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss.">Miss.</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Full Name</label>
                </div>
                <input type="text" class="form-control" name="full_name">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Short Name</label>
                </div>
                <input type="text" class="form-control" name="short_name">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">NIC</span>
                </div>
                {{Form::text('nic',null,['class'=>'form-control','placeholder'=>'NIC Number',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                </div>
                <select class="custom-select" id="gender" name="gender">
                    <option selected>Choose Gender...</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Address</span>
                </div>
                <textarea name="address" id="" cols="30" rows="4" class="form-control"></textarea>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Phone</span>
                </div>
                {{Form::text('phone',null,['class'=>'form-control','placeholder'=>'Contact Number',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fab fa-whatsapp"></i>
                    </span>
                </div>
                {{Form::text('whatsapp',null,['class'=>'form-control','placeholder'=>'Contact Number',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>

            <div class="input-group mb-3">
                {{Form::submit('Save',['class'=>'btn btn-success ml-2 '])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
