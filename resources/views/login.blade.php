@extends('layout')
@section('page_title', 'Login')

@section('container')



<form  method="POST" action="javascript:void(0);" id="loginform" name="loginform">
<div class=" bg-grad d-flex justify-content-center align-items-center">
    <div class=" bg-white p-3 rounded-3" style="width: 32%;">

      <div class="text-center">
      <h5 class=" text-muted border-bottom d-inline-block p-1 border-2 border-info">Welcome to airindustry</h5>
    </div>
      <div class="">
        <h5 class="text-muted py-2">Login Form</h5>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email or Phone</label>
          <input required name="email" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          <span id="email-error" class="text-small text-danger"></span>
        </div>

        <div class="mb-1">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input required name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
          <span id="password-error" class="text-small text-danger"></span>
        </div>
        <a href="#" class="text-info ">Forgot Password ?</a>
        <br>

        <button id="login" type="button" class="btn btn-primary w-100 my-3 login-btn text-uppercase">Login
            <span id="login-spinner" class="spinner-border spinner-border-sm ps-2 d-none" role="status" aria-hidden="true"></span>
            <span class="visually-hidden ">Loading...</span>
        </button>
        <p class=" text-center ">Not a member? <a href="register" class="text-info">Signup Now</a> </p>
      </div>




    </div>

  </div>
</form>

@endsection
