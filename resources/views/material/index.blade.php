@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-6"><h4>Update Raw Material</h4></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{ url('/raw/material/update/'.$materials->id) }}" enctype="multipart/form-data">
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
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Material Name</label>
                            <input type="text" class="form-control" name="material_name" value="{{$materials->material_name}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Material Type Unit</label>
                            <input type="text" class="form-control" name="unit_type" required value="{{$materials->unit_type}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" class="form-control" step="any" required value="{{$materials->price}}" name="price" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Note</label>
                            <textarea class="form-control" name="note" cols="30" rows="3" value="{{$materials->note}}"></textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
