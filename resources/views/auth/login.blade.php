@extends('layouts.app')

@section('content')
<section class="vh-100 gradient-custom">
    <div class="container py-2 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <form class="mb-md-5 mt-md-2 pb-5" action="{{ route('login') }}" method="POST">
                @csrf
                <h5 class="fw-bold mb-5 text-uppercase">Sistem Pendukung Keputusan Bibit Sawit</h5>
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>

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

                <p class="small mb-2 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

            </form>

              <!--<div>-->
              <!--  <p class="mb-0">Don't have an account? <a href="{{route('register')}}" class="text-white-50 fw-bold">Sign Up</a>-->
              <!--  </p>-->
              <!--</div>-->

            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
