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
                    <input type="text" name="name" id="inventory-name" class="form-control" placeholder="Name of the crop | products | harvests (Name must be unique)">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Invoice Name</label>
                    </div>
                    <input type="text" name="invoice_name" id="invoice-name" class="form-control" placeholder="Name to appear in invocie (Name must be unique)">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Description</label>
                    </div>
                    <textarea name="description" id="" class="form-control" rows="4"></textarea>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Mesuring Unit</label>
                    </div>
                    <select name="unit" id="">
                        <option value="Bag">Bag - Bags</option>
                        <option value="Btl">Btl - Bottles</option>
                        <option value="Box">Box - Boxes</option>
                        <option value="Bdl">Bdl - Bundles</option>
                        <option value="Can">Can - Cans</option>
                        <option value="cm">cm - Centi Meters</option>
                        <option value="Doz">Doz - Dozens</option>
                        <option value="ft">ft - Feets</option>
                        <option value="g">g - Grams</option>
                        <option value="in">in - Inches</option>
                        <option value="kg">kg - Kilo Grams</option>
                        <option value="l">l - Liters</option>
                        <option value="ml">ml - Milli Liters</option>
                        <option value="m">m - Meters</option>
                        <option value="mm">mm - Milli Meters</option>
                        <option value="Nos">Nos - Numbers</option>
                        <option value="Pcs">Pcs - Pieces</option>
                        <option value="Rol">Rol - Rolls</option>
                        <option value="Sqm">Sqm - Square Meters</option>
                        <option value="Sqft">Sqft - Square Feets</option>
                        <option value="yd">yd - Yards</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Buying Price</label>
                    </div>
                    <input type="number" name="purchase_price" class="form-control" placeholder="price in LKR" step="any">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Selling Price</label>
                    </div>
                    <input type="number" name="sale_price" class="form-control" placeholder="price in LKR" step="any">
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

        $("#inventory-name").keyup(function(){
            $("#invoice-name").val($("#inventory-name").val());
        });
    </script>
    <style>
        .border-5{
            border-width: 5px !important;
        }
    </style>
@endsection
