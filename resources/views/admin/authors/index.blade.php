@extends('admin.layouts.app')
@section('title','Index')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Author</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Author</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Author List</h3>
              <div class="card-tools">
                  <a class="btn btn-success" href="{{ route('authors.create') }}">Add New Author</a>
              </div>
            </div>
            <div class="card-body">
                 <table class="table table-bordered table-striped">
                     <tr>
                         <th>Author Name</th>
                         <th>Author Image</th>
                         <th>Action</th>
                     </tr>
                     @foreach ($authors as $author)
                        <tr>
                            <td>{{ $author->name }}</td>
                            <td><img src="{{asset("/storage/$author->image")}}" alt="" height="50"></td>
                            <td style="width: 150px;">
                                <a class="btn btn-warning" href="{{ route('authors.edit',$author->id) }}">Edit</a>
                                <form action="{{ route('authors.destroy',$author->id)}}" method="post" style="display: inline" onclick="return confirm('Are you sure you want to delete this item?');">
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
