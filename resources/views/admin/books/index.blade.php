@extends('admin.layouts.app')
@section('title','Index')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Book</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Book</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Book List</h3>
              <div class="card-tools">
                  <a class="btn btn-success" href="{{ route('books.create') }}">Add New Book</a>
              </div>
            </div>
            <div class="card-body">
                 <table class="table table-bordered table-striped " width="100%" id="myTable">
                   <thead>
                    <tr>
                        <th>SL</th>
                        <th>Book Name</th>
                        <th>Category</th>
                        <th>Publisher</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                   </thead>
                   <tbody>
                     {{-- @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->publisher->name }}</td>
                            <td>
                            @foreach ($book->authors as $author)
                                {{ $author->name }},
                            @endforeach
                            </td>
                            <td>{{ $book->price }}</td>
                            <td><img width="50" height="50" src="{{asset("storage/$book->image")}}" alt=""></td>
                            <td>{{ $book->discount_amount }}</td>
                            <td>{{ $book->description }}</td>
                            <td style="width: 150px;">
                                @if($book->status==1)
                                    <a href="{{ route('books.show',$book->id) }}" onclick="return confirm('Are you sure change status?')" class="btn btn-success btn-sm">
                                        Active
                                    </a>
                                    @else
                                    <a href="{{ route('books.show',$book->id) }}" onclick="return confirm('Are you sure change status?')" class="btn btn-danger btn-sm">
                                        Inactive
                                   </a>
                                @endif
                            </td>
                            <td>
                                <div class="btn-style d-flex">
                                    <div class="edit-btn mr-1">
                                        <a class="btn btn-warning" href="{{ route('books.edit',$book->id) }}">Edit</a>
                                    </div>
                                    <div class="delete-btn">
                                        <form action="{{ route('books.destroy',$book->id)}}" method="post" onclick="return confirm('Are you sure you want to delete this item?');">
                                            @csrf
                                            @method('delete')
                                             <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                     @endforeach --}}


                    </tbody>
                 </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
@endsection

@push('css')
 <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
             responsive: true,
             processing: true,
             serverSide: true,
             ajax:"{{ url('/admin/books/list') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'category_name' ,orderable: false, searchable: false },
                { data: 'publisher_name' ,orderable: false, searchable: false },
                { data: 'price', name: 'price' },
                { data: 'discount_amount', name: 'discount_amount' },
                { data: 'image', name: 'image', orderable: false, searchable: false },
                { data: 'status', name: 'status',orderable: false, searchable: false },
                { data: 'action' ,orderable: false, searchable: false },

              ]
            });
        });
    </script>
@endpush
