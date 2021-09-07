@extends('layout')
@section('page_title', 'Register')

@section('container')



<form method="POST" action="javascript:void(0);" id="signupform" name="signupform">
    {{-- @csrf --}}
    <div class="bg-grad d-flex justify-content-center align-items-center">
        <div class=" bg-white p-3 rounded-3" style="width: 32%;">

            <div class="text-center">
                <h5 class=" text-muted border-bottom d-inline-block p-1 border-2 border-info">Welcome to airindustry
                </h5>
            </div>
            <div class="">
                <h5 class="text-muted py-2">Lets create your account</h5>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input required type="email" name="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                    <input required minlength="10" maxlength="10" type="number" name="phone" class="form-control"
                        placeholder="Enter your Phone number">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Select Gender</label>
                    <select name="gender" class="form-select" aria-label="Default select example" required>
                        <option selected disabled>select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>


                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input minlength="6" type="password" name="password" class="form-control"
                        id="exampleFormControlInput1" placeholder="Create new Password" required>
                </div>

                <button type="submit" id="signup" class="btn btn-primary w-100 my-3 login-btn text-uppercase">Let's
                    Begin
                    <span id="register-spinner" class="spinner-border spinner-border-sm ps-2 d-none" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden ">Loading...</span>
                </button>
                <p class=" text-center ">Go back to <a href="/" class="text-info">Login</a> </p>
            </div>




        </div>
    </div>
</form>


@endsection
