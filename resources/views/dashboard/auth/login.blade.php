@extends('dashboard.auth.layout')
@section('title')
Login
@endsection

<div class="login-box">
  <div class="login-logo">
    <b>RaOouf</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      @if (request()->session()->has('error-msg'))
        <div class="text-danger font-weight-bold text-center">
            <p>{{request()->session()->get('error-msg')}}</p>
        </div>
      @endif
        {{-- Login --}}
      <form method="POST" action="#">
        @csrf
        <div class="input-group mb-3">
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>


          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">

          <!-- btn-login -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
          </div>
          <!-- btn-login -->
        </div>
      </form>
        {{-- Login --}}
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{asset('register')}}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>
</html>


































