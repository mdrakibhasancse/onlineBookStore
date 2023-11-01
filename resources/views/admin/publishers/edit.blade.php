@extends('admin.layouts.app')
@section('title','Create')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Publisher</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Publisher</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Publisher Edit</h3>
            </div>
                <form action="{{ route('publishers.update',$publisher->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Publisher Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $publisher->name }}" id="exampleInputEmail1">
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                          <label for="exampleInputEmail1">Publisher Address</label>
                          <input type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $publisher->address }}" id="exampleInputEmail1">
                          @error('address')
                          <span style="color: red">{{ $message }}</span>
                          @enderror
                    </div>


                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
          </div>
          <!-- /.card -->
@endsection
