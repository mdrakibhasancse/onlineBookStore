@extends('admin.layouts.app')
@section('title','Create')

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
              <h3 class="card-title mt-2">Author Create</h3>
            </div>
                <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Author Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="exampleInputEmail1" placeholder="Enter Author Name">
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Author Image</label>
                        <input type="file" name="image">
                    </div>

                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
          </div>
          <!-- /.card -->
@endsection
