@extends('admin.layouts.app')
@section('title','Pending Order')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Pending Order</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pending Order</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Pending Order List</h3>
              <div class="card-tools">
                  <a class="btn btn-success" href="{{ url('admin/orders/approved')}} ">Back</a>
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
                                @if($order->status=='0')
                                <button type="submit" class="badge badge-danger btn" onclick="approvalOrder({{ $order->id}})"> Pending</button>

                                <form id="approval-form" action="{{ url("admin/orders/approve/$order->id") }}" method="post" style="dispaly:none">
                                 @csrf

                               </form>
                                @else
                                <button class="badge badge-success btn"> Approved</button>
                                @endif
                            </td>
                            {{-- <td>
                                <a href="{{ url("admin/orders/approve/$order->id")}}" data-token={{ csrf_token() }} data-id={{ $order->id }}
                                    class="btn btn-primary">Approve</a>
                            </td> --}}
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
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );


        function approvalOrder(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approved this order!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approved it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success ml-2',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'This order remain pending :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush

