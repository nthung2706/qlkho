@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <a href="{{ route('google.login') }}" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Modal: Login with Avatar Form-->
    {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header">
        <img src="{{url('public/images/agulogo.png')}}" alt="avatar" class="rounded-circle img-responsive">
      </div>
      <!--Body-->
      <form method="POST" action="{{ route('login') }}">
                        @csrf
      <div class="modal-body text-center mb-1">

        <h5 class="mt-1 mb-2">Quản lý kho</h5>
        
            <div class="md-form ml-0 mr-0">
                <input  type="email" id="form29" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control form-control-sm validate ml-0">
                <label data-error="wrong" data-success="right" for="form29" class="ml-0">Email</label>
            </div>

            

            <div class="md-form ml-0 mr-0">
                <input  type="password" id="form29" name="password" value="{{ old('password') }}" required autocomplete="email" autofocus class="form-control form-control-sm validate ml-0">
                <label data-error="wrong" data-success="right" for="form29" class="ml-0">Mật khẩu</label>
            </div>
            

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-outline-success btn-rounded waves-effect">Đăng nhập<i class="fas fa-sign-in ml-1"></i></button>
        </div>
      </div>
      </form>

    </div>
    <!--/.Content-->
  </div>
</div> --}}
    <!--Modal: Login with Avatar Form-->
@endsection
