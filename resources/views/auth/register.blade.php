@extends('layouts.app')

@section('content')
<section class="vh-100 gradient-custom">
    <div class="container py-2 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body px-5 text-center">

              <form class="mb-md-5 mt-md-4 pb-1" action="{{ route('register') }}" method="POST">
                @csrf
                <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
                <p class="text-white-50 mb-5">Please enter your data!</p>

                <div class="form-outline form-white mb-4">
                  <input type="text" id="typeNameX" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" />
                  <label class="form-label" for="typeNameX">Name</label>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="email" id="typeEmailX" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" />
                  <label class="form-label" for="typeEmailX">Email</label>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>


                <div class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"/>
                  <label class="form-label" for="typePasswordX">Password</label>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" id="typeConfirmPasswordX" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation"/>
                  <label class="form-label" for="typeConfirmPasswordX">Password Confirmation</label>
                  @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Sign Up</button>

            </form>

              <div>
                <p class="mb-0">Already have an account? <a href="{{route('login')}}" class="text-white-50 fw-bold">Login</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
