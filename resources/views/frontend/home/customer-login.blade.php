@extends('frontend.layouts.app')
@section('title','Create_account')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>LOGIN FORM</h2>
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="index.html">Home</a>
                        </li>
                        <li>Login</li>
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
                <form action="{{ route('login') }}" class="create-account-form" method="post">
                    @csrf
                     <h2 class="heading-title text-info">
                        sign in
                     </h2>
                     <p class="form-row">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </p>
                     <p class="form-row">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" placeholder="Password">
                        @error('password')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </p>
                     <div class="submit">
                         <button name="submitcreate" id="submitcreate" type="submit" class="btn-default">
                             <span>
                                 <i class="fa fa-user left"></i>
                                 SING IN
                             </span>
                         </button>
                         <i class="fa fa-user"></i> No account yet ? <a href="{{ url('/customer-signup')}}"><span class="text-info"> Signup new account</span></a>
                     </div>

                </form>
             </div>
         </div>
    </div>
 </div>
@endsection
