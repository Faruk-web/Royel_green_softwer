@extends('layouts.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="">Category</h4>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
        </div>
        
       
    </div>
    <!-- END Full Table -->
</div>
<!-- END Page Content -->

<!-- Fade In Block Modal -->
<div>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                    <form action="/category/update" method="post">
                        @csrf
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-light">Update Category</h3>
                            
                        </div>
                        <div class="block-content font-size-sm">
                          
                           </div>
                            <div class="form-group">
                                <label for="example-text-input">Category Name</label>
                                <input type="text" class="form-control"  value="{{$category->title}}" required name="name" >
                                <input type="hidden" class="form-control"  value="{{$category->id}}" required name="id" >
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                           
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Fade In Block Modal -->
@endsection
