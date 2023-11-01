@extends('admin.layouts.app')
@section('title','Approved Order')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Approved Order</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Approved Order</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Approved Order List</h3>
              <div class="card-tools">
                  <a class="btn btn-success" href="">Back</a>
              </div>
            </div>
            <div class="card-body">
                 <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Order No</th>
                            <th>Total Amount</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Details</th>
                         </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>#{{ $order->order_no }}</td>
                           <td>{{ $order->total_tk }}</td>
                           <td>{{ $order->payment->payment_method }}
                               @if($order->payment->payment_method == 'BKash')
                                   (Transaction_no : {{$order->payment->transaction_no}})
                               @endif
                           </td>
                           <td>
                               @if($order->status == '0')
                                <span class="badge badge-warning">Pending</span>
                               @else
                               <span class="badge badge-primary">Approved</span>
                               @endif
                           </td>
                           <td>
                               <a href="{{ url("admin/orders/details/$order->id")}}" class="badge badge-primary">Details</a>
                           </td>
                        </tr>
                      @endforeach
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
            $('#myTable').DataTable();
        } );
    </script>
@endpush
