@extends('admin.layouts.app')
@section('title','Index')

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
              <h3 class="card-title mt-2">Publisher List</h3>
              <div class="card-tools">
                  <a class="btn btn-success" href="{{ route('publishers.create') }}">Add New Publisher</a>
              </div>
            </div>
            <div class="card-body">
                 <table class="table table-bordered table-striped">
                     <tr>
                         <th>Publisher Name</th>
                         <th>Publisher Address</th>
                         <th>Action</th>
                     </tr>
                     @foreach ($publishers as $publisher)
                        <tr>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('publishers.edit',$publisher->id) }}">Edit</a>
                                <form action="{{ route('publishers.destroy',$publisher->id)}}" method="post" style="display: inline" onclick="return confirm('Are you sure you want to delete this item?');">
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
