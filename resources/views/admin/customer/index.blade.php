@extends('admin.layouts.app')
@section('title','Dashboard')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Dashboard</h1>
    </div>
  </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title mt-2">User List</h3>
    </div>
    <div class="card-body">
         <table class="table table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            {{-- <tbody>
                 @foreach ($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }} </td>
                    <td>{{ $customer->mobile }}</td>
                    <th>
                        <form action="{{url("/admin/customers/$customer->id")}}"method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </th>

                </tr>
                @endforeach
             </tbody> --}}
         </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
  </div>
@endsection

@push('css')
 <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
             processing: true,
             serverSide: true,
             ajax:"{{ url('/admin/customers/list') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'mobile' ,orderable: false, searchable: false },
                { data: 'action' ,orderable: false, searchable: false },
              ]
            });
        });
    </script>
@endpush

