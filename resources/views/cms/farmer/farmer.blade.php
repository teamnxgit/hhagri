@extends('layouts.app')

@section('content')

@include('navbar.farmer')

    @can('Farmer Operator')
    <div class="col-lg-12 p-3">
    
        <div class="row">
            <div class="col-12">
            <div class="h3">Grower : {{$farmer->full_name}}</div>
            </div>
        </div>

        <hr>
        {!! Form::open(['url' => '/farmer/update']) !!}
        <div class="p-3 bg-light border rounded row m-1 mt-3">
            <div class="h5 col-12">Grower Basic Details</div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Farmer Code</span>
                </div>
                {{Form::text('farmer_code',$farmer->farmer_code,['class'=>'form-control','readonly'])}}
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text">Title</label>
                </div>
                <select class="custom-select" id="town" name="title">
                    <option value="Mr." @if($farmer->title=='Mr.')selected @endif>Mr.</option>
                    <option value="Mrs." @if($farmer->title=='Mrs.')selected @endif>Mrs.</option>
                    <option value="Miss." @if($farmer->title=='Miss.')selected @endif>Miss.</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Full Name</label>
                </div>
            <input type="text" class="form-control" name="full_name" value="{{$farmer->full_name}}">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Short Name</label>
                </div>
            <input type="text" class="form-control" name="short_name" value="{{$farmer->short_name}}">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">NIC</span>
                </div>
                {{Form::text('nic',$farmer->nic,['class'=>'form-control','placeholder'=>'NIC Number',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                </div>
                <select class="custom-select" id="gender" name="gender">
                    <option selected>Choose Gender...</option>
                    <option value="M" @if($farmer->gender=='M')selected @endif>Male</option>
                    <option value="F" @if($farmer->gender=='F')selected @endif>Female</option>
                    <option value="O" @if($farmer->gender=='O')selected @endif>Other</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">House #</span>
                </div>
                {{Form::text('house_no',$farmer->house_no,['class'=>'form-control','placeholder'=>'Number of the House',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Street</span>
                </div>
                {{Form::text('street',$farmer->street,['class'=>'form-control','placeholder'=>'Number of the Street',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Town</span>
                </div>
                {{Form::text('town',$farmer->town,['class'=>'form-control','placeholder'=>'Town / Village',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Town</span>
                </div>
                {{Form::text('district',$farmer->district,['class'=>'form-control','placeholder'=>'District',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Phone</span>
                </div>
                {{Form::text('phone',$farmer->phone,['class'=>'form-control','placeholder'=>'Contact Number',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fab fa-whatsapp"></i>
                    </span>
                </div>
                {{Form::text('whatsapp',$farmer->whatsapp,['class'=>'form-control','placeholder'=>'Contact Number',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        Data Entry by
                    </span>
                </div>
                {{Form::text('created_by',$farmer->creator->name ." @ ".$farmer->created_at,['class'=>'form-control','placeholder'=>'Contact Number',"aria-label"=>"Full Name","aria-describedby"=>"basic-addon1"])}}
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        Data Updated by
                    </span>
                </div>
                <input type="text" name="updated" value="<?php if (isset($farmer->updator)) {echo $farmer->updator->name ." @ ".$farmer->updated_at;}?>" class='form-control'>
            </div>

            <div class="input-group mb-3">
                {{Form::submit('Save',['class'=>'btn btn-success ml-2 '])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @endcan
@endsection