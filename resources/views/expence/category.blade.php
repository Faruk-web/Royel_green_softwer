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
            <div class="block-options">
                <button type="button" class="btn btn-rounded btn-primary push" data-toggle="modal" data-target="#modal-block-fadein">Add New Category</button>
            </div>
        </div>
        
        <div class="block-content">
            <div class="table-responsive">
                <table width="100%" class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                         @php( $i = 1 )
                        @foreach($categorys as $category)
                        <tr>
                            <td>{{$i}}</em></td>
                            
                            <td>{{$category->title}}</em></td>
                            <td width="25%">
                                <a type="button" href="{{url('/expense/edit-category/'.$category->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Edit">Edit</a>
                            </td>
                        </tr>
                        @php( $i += 1 )
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Full Table -->
</div>
<!-- END Page Content -->

<!-- Fade In Block Modal -->
<div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                    <form action="/category/store" method="post">
                        @csrf
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-light">Add New Category</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                           
                            <div class="form-group">
                                <label for="example-text-input">Category Name</label>
                                <input type="text" class="form-control" id="" required name="name" >
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Fade In Block Modal -->
@endsection
