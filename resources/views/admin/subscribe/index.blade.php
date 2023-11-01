@extends('admin.layouts.app')
@section('title','Index')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Subscribe</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Subscribe</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Subscribe List</h3>
            </div>
            <div class="card-body">
                 <table class="table table-bordered table-striped">
                     <tr>
                         <th>SL</th>
                         <th>Email</th>
                         <th>Action</th>
                     </tr>
                     @foreach ($subscribes as $subscribe)
                        <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td> {{ $subscribe->email }} </td>
                                <td  style="width: 250px;">
                                    <form action="{{ route('subscribes.destroy',$subscribe->id)}}" method="post" onclick="return confirm('Are you sure you want to delete this item?');">
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
