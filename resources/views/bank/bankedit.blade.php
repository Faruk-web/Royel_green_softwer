@extends('layouts.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    <!-- Overview -->
    <div class="row">
    <div class="col-sm-12 col-xl-12 col-md-12">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column">
                <div
                    class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <div class="col-lg-12 col-xl-12">
                    <form action="{{url('bank/update-bank/'.$bank->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                            <label for="example-text-input-alt"><span class="text-danger">*</span>Bank Name</label>
                            <input type="text" class="form-control form-control-alt" value='{{$bank->name}}' name="name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="form-group">
                            <label for="example-text-input-alt"><span class="text-danger">*</span>Branch Name</label>
                            <input type="text" class="form-control form-control-alt" value='{{$bank->branch}}' name="branch" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="form-group">
                            <label for="example-text-input-alt"><span class="text-danger">*</span>A/c Number</label>
                            <input type="text" class="form-control form-control-alt" value='{{$bank->account_no}}' name="account_no" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="form-group">
                            <label for="example-text-input-alt"><span class="text-danger">*</span>A/C Type</label>
                            <input type="text" class="form-control form-control-alt" value='{{$bank->account_type}}' name="account_type" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Overview -->

</div>
<!-- END Page Content -->
@endsection
