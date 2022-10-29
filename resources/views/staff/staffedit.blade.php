@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-6"><h4>Staff Update</h4></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('staff.update')}}" enctype="multipart/form-data">
                {{-- <form method="POST" enctype="multipart/form-data"> --}}
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span> Name</label>
                            <input type="text" class="form-control" name="name" value="{{$staff->name}}" required>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$staff->phone}}" >
                            <input type="hidden" class="form-control" name="c_id" value="{{$staff->id}}" >
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sallery</label>
                            <input type="number" class="form-control" name="sallery" value="{{$staff->sallery}}" >
                           
                        </div>
                    </div>
                    
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea name="address" class="form-control" id="" cols="10" rows="3">{{$staff->address}}</textarea>
                        </div>
                    </div>
                   </div>
                <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-rounded">Update</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection