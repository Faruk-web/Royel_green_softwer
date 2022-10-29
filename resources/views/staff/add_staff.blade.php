@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-6"><h4>Add Staff</h4></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('staff.store')}}" enctype="multipart/form-data">
                {{-- <form method="POST" enctype="multipart/form-data"> --}}
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span> Name</label>
                            <input type="text" class="form-control" name="name" required>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" class="form-control" name="phone" >
                           
                        </div>
                    </div>
                </div>

                <div class="row">
                   
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sallery</label>
                            <input type="number" class="form-control" name="sallery" >
                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date</label>
                              <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control"   >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea name="address" class="form-control" id="" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Note</label>
                               <textarea name="note" class="form-control" id="" cols="10" rows="3"></textarea>
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
