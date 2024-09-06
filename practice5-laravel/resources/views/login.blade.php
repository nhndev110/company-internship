@extends('layouts.public')

@section('main')
  <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
    style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
    <div class="container">
      <div class="form-box">
        <div class="form-tab">
          <ul class="nav nav-pills nav-fill" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                aria-controls="signin-2" aria-selected="false">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab"
                aria-controls="register-2" aria-selected="true">Register</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
              <form action="{{ url('/login') }}" method="POST">
                @csrf
                @if (session('error'))
                  <div class="alert alert-danger">
                    {{ session('error') }}
                  </div>
                @endif
                <div class="form-group">
                  <label for="singin-email-2">Username or email address <span class="text-danger">*</span></label>
                  <input type="text" value="{{ old('username') }}"
                    class="form-control @error('username') is-invalid @enderror" id="singin-email-2" name="username"
                    autocomplete="off">
                  @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="singin-password-2">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror"
                    id="singin-password-2" name="password" autocomplete="off">
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-footer">
                  <button type="submit" class="btn btn-outline-primary-2">
                    <span>LOG IN</span>
                    <i class="icon-long-arrow-right"></i>
                  </button>

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="signin-remember-2" name="loginRemember"
                      checked>
                    <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                  </div>

                  <a href="#" class="forgot-link">Forgot Your Password?</a>
                </div>
              </form>
              <div class="form-choice">
                <p class="text-center">or sign in with</p>
                <div class="row">
                  <div class="col-sm-6">
                    <a href="#" class="btn btn-login btn-g">
                      <i class="icon-google"></i>
                      Login With Google
                    </a>
                  </div>
                  <div class="col-sm-6">
                    <a href="#" class="btn btn-login btn-f">
                      <i class="icon-facebook-f"></i>
                      Login With Facebook
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
              <form action="#">
                <div class="form-group">
                  <label for="register-email-2">Your email address *</label>
                  <input type="email" class="form-control" id="register-email-2" name="register-email" required>
                </div>

                <div class="form-group">
                  <label for="register-password-2">Password *</label>
                  <input type="password" class="form-control" id="register-password-2" name="register-password" required>
                </div>

                <div class="form-footer">
                  <button type="submit" class="btn btn-outline-primary-2">
                    <span>SIGN UP</span>
                    <i class="icon-long-arrow-right"></i>
                  </button>

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                    <label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy
                        policy</a> *</label>
                  </div>
                </div>
              </form>
              <div class="form-choice">
                <p class="text-center">or sign in with</p>
                <div class="row">
                  <div class="col-sm-6">
                    <a href="#" class="btn btn-login btn-g">
                      <i class="icon-google"></i>
                      Login With Google
                    </a>
                  </div>
                  <div class="col-sm-6">
                    <a href="#" class="btn btn-login  btn-f">
                      <i class="icon-facebook-f"></i>
                      Login With Facebook
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
