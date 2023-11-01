@extends('admin.layouts.app')
@section('title','Dashboard')
@section('top-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>DashBoard</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
        <li class="breadcrumb-item active">DashBoard</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ count($authors) }}</h3>

                    <p>Total Author</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('authors.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ count($books) }}</h3>

                    <p>Total Book</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('books.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
                     <!-- small box -->
                     <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ count($customer) }}</h3>

                            <p>Total RegisterUser</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('/admin/customers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>

            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count($publishers) }}</h3>

                      <p>Total Publisher</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('publishers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                      Popular Book
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                          <tr>
                              <th>SL</th>
                              <th>Book Name</th>
                              <th>Price</th>
                              <th>Description</th>
                              <th>Image</th>
                              <th>Status</th>
                          </tr>
                        </tr>
                        @foreach ($popular_books as $book)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $book->name }}</td>
                              <td>{{ $book->price }}</td>
                              <td>{{ Str::limit($book->description,25) }}</td>
                              <td><img width="50" height="50" src="{{asset("storage/$book->image")}}" alt=""></td>
                              <td>
                                  @if($book->status==1)
                                      <a href="javascript:void()" class="badge badge-success">
                                          Active
                                      </a>
                                      @else
                                      <a href="javascript:void()" class="badge badge-danger">
                                          Inactive
                                  </a>
                                  @endif
                             </td>
                          </tr>
                        @endforeach
                     </table>
                </div><!-- /.card-body -->
              </div>
            </section>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
