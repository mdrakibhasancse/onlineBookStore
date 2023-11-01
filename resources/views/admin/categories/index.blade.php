@extends('admin.layouts.app')
@section('title','Index')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Category</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Category List</h3>
              <div class="card-tools">
                  <a class="btn btn-success" href="{{ route('categories.create') }}">Add New Category</a>
              </div>
            </div>
            <div class="card-body">
                 <table class="table table-bordered table-striped">
                     <tr>
                         <th>Category Name</th>
                         <th>Status</th>
                         <th>Action</th>
                     </tr>
                     @foreach ($categories as $category)
                        <tr>
                               <td>{{ $category->name }}</td>
                               <td style="width: 150px;">
                                @if($category->status==1)
                                    <a href="{{ route('categories.show',$category->id) }}" onclick="return confirm('Are you sure change status?')" class="btn btn-success btn-sm">
                                        Active
                                    </a>
                                    @else
                                    <a href="{{ route('categories.show',$category->id) }}" onclick="return confirm('Are you sure change status?')" class="btn btn-danger btn-sm">
                                        Inactive
                                   </a>
                                @endif
                               </td>
                                <td  style="width: 250px;">
                                    <a class="btn btn-warning" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                                    <form action="{{ route('categories.destroy',$category->id)}}" method="post" style="display: inline" onclick="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                        </tr>
                     @endforeach
                 </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
@endsection
