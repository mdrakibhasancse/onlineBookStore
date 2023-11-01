@extends('admin.layouts.app')
@section('title','ManageReview')
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Dashboard</h1>
    </div>
  </div>
@endsection
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Review</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Review</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Review List</h3>
            </div>
            <div class="card-body">
                 <table class="table table-bordered table-striped">
                     <tr>
                         <th>Name</th>
                         <th>Review of Book</th>
                         <th>Review Message</th>
                         <th>Rating</th>
                         <th>Status</th>
                         <th style="width: 100px;">Action</th>
                     </tr>
                     @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->book->name }}</td>
                            <td>{{ $review->message }}</td>
                            <td>{{ $review->rating }}</td>
                            <td style="width: 150px;">
                             @if($review->status==1)
                                 <a href="{{ url("admin/review/update/$review->id")}}" onclick="return confirm('Are you sure change status?')" class="btn btn-success btn-sm">
                                     Active
                                 </a>
                                 @else
                                 <a href="{{ url("admin/review/update/$review->id")}}" onclick="return confirm('Are you sure change status?')" class="btn btn-danger btn-sm">
                                     Inactive
                                </a>
                             @endif
                            </td>
                            <td>
                                  <form action="{{ url("admin/review/delete/$review->id") }}" method="post">
                                     @csrf
                                     @method('delete')
                                       <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
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
