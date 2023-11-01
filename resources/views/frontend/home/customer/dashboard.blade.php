@extends('frontend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Dashboard</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="index.html">Home</a>
                            </li>
                            <li>Dashbord</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

  	<!-- My Account Area Start -->
      <div class="my-account-area section-padding" style="background-color: #f4f6f9;">
        <div class="container " style="margin-top:20px; margin-bottom:20px;">
            <div class="section-title2">
                <h2>Dashboard</h2>
                <div class="row">
                    <div class="col-lg-7">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                       @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="addresses-lists">
                    <div class="col-xs-12 col-sm-6 col-lg-7">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa fa-user"></i>
                                           <span>Update Profile</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="coupon-info">
                                            <h1 class="heading-title">Your addresses </h1>


                                            <form action="{{ url('/dashboard/profile')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <p class="form-row">
                                                    <input type="text" name="name" placeholder="Your Name *">
                                                </p>
                                                <p class="form-row">
                                                    <input type="email" name="email" placeholder="Email *">
                                                </p>
                                                <p class="form-row">
                                                    <input type="text" name="mobile" placeholder="Mobile ">
                                                </p>

                                                <p class="form-row">
                                                    <input type="file" name="image">
                                                </p>


                                                <button title="Update" class="btn button button-small">
                                                    <span>
                                                          Update
                                                        <i class="fa fa-chevron-right"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <i class="fa fa-shield"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <div class="coupon-info">
                                            <form action="{{ url('/dashboard/password')}}" method="POST">
                                              @csrf
                                                <p class="form-row">
                                                    <input type="text" name="old_password" placeholder="Old Password *" />
                                                </p>


                                                <p class="form-row">
                                                    <input type="text" name="password" placeholder="New Password *" />
                                                </p>

                                                <p class="form-row">
                                                    <input type="text" name="password_confirmation" placeholder="Confirm Password *" />
                                                </p>

                                                <button title="Update" class="btn button button-small">
                                                    <span>
                                                          Update
                                                        <i class="fa fa-chevron-right"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-12">
                                <div class="create-account-button pull-left">
                                    <a href="{{ url('/')}}" class="btn button button-small" title="Home">
                                        <span>
                                            <i class="fa fa-chevron-left"></i>
                                              Home
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-5">
                        <div class="panel" id="top-panel">
                            <div class="panel-body box-profile">
                              <div class="text-center" style="margin-bottom: 10px;">
                                <img style="height: 100px; width:100px;" class="profile-user-img img-fluid img-circle" src="{{(!empty($user->image)) ? asset("storage/".$user->image) : asset('/upload/extra.jpg')}}" alt="profile picture">
                              </div>

                              <h3 class="profile-username text-center" >{{ $user->name }}</h3>

                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item text-center">
                                  <b>{{ $user->email }}</b>
                                </li>

                                @if($user->mobile)
                                    <li class="list-group-item text-center">
                                        <b>{{ $user->mobile }}</b>
                                    </li>
                                @endif
                              </ul>

                            </div>
                            <!-- /.card-body -->
                          </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- My Account Area End -->
@endsection

<style>

.list-group-unbordered>.list-group-item {
    border-left: 0;
    border-radius: 0;
    border-right: 0;
    padding-left: 0;
    padding-right: 0;
}

#top-panel {
    border-top: 3px solid #007bff;
}
</style>
