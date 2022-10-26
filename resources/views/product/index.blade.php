@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-6"><h4>Add New Product</h4></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 text-danger">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="" placeholder="product name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Class</label>
                            <input type="text" class="form-control" name="class" placeholder="Enter class">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Size</label>
                            <input type="text" class="form-control" name="size" value="" placeholder="Enter size"  required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Salling Price</label>
                            <input type="number" class="form-control" name="price" step="any" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Unit Type</label>
                            <input type="text" class="form-control" name="unit_type" placeholder="Ex. Piece" required>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                <button type="submit" class="btn btn-success btn-rounded">Save</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
