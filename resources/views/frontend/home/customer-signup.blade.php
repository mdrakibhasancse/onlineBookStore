@extends('frontend.layouts.app')
@section('title','Create_account')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>SIGNUP FORM</h2>
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{ url('/')}}">Home</a>
                        </li>
                        <li>sign up</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login-account section-padding">
    <div class="container">
         <div class="row">
             <div class="col-md-6 col-md-offset-3 ">
                <form action="{{ url('/customer-signup/store') }}" class="create-account-form" method="post">
                    @csrf
                     <h2 class="heading-title">
                         CREATE AN ACCOUNT
                     </h2>
                     <p class="form-row">
                        <input type="text"  class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                        @error('name')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </p>

                     <p class="form-row">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </p>
                    <p class="form-row">
                        <input type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Number">
                        @error('mobile')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </p>

                    <p class="form-row">
                        <input type="password" class="form-control"  name="password" placeholder="Password">
                        @error('password')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                    </p>
                    <p class="form-row">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                    </p>

                     <div class="submit">
                         <button name="submitcreate" id="submitcreate" type="submit" class="btn-default">
                             <span>
                                 <i class="fa fa-user left"></i>
                                 SIGN UP
                             </span>
                         </button>
                         <i class="fa fa-user"></i> Have you account ? <a href="{{ url('/customer-login')}}"><span class="text-info"> login here</span></a>
                     </div>
                 </form>
             </div>
         </div>
    </div>
 </div>
@endsection
