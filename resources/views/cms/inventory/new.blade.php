@extends('layouts.app')

@section('content')

@include('navbar.inventory')
    <div class="col-lg-12 p-3">


        <div class="p-3 bg-light border rounded row m-1 mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="h3">New Inventory Item</div>
                </div>
            </div>
            <hr>
            {!! Form::open(['url' => '/inventory/add','method'=>'post','enctype'=>'multipart/form-data']) !!}
            <div class="p-3 bg-light border rounded row m-1">
            
                <div class="h5 col-12 pb-3">Enter the details to add new farmer</div>
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Inventory Name</label>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="Name of the crop | products | harvests (Name must be unique)">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Description</label>
                    </div>
                    <textarea name="description" id="" class="form-control" rows="4"></textarea>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Price</label>
                    </div>
                    <input type="number" name="price" class="form-control" placeholder="price in LKR" step="any">
                </div>

                <div class="input-group mb-3">
                    <input type="file" class="custom-file-input" name="image" id="img-url">
                    <label class="custom-file-label"for="customFile">Choose file</label>
                </div>

                <img src="#" alt="" id="preview-image" srcset="" class="col-lg-2 border border-5 border-white rounded shadow-sm" style="height: 150px;width:150px;">
    
                <div class="input-group mb-3 pt-3">
                    {{Form::submit('Save',['class'=>'btn btn-success ml-2 '])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#img-url").change(function() {
            readURL(this);
        });
    </script>
    <style>
        .border-5{
            border-width: 5px !important;
        }
    </style>
@endsection