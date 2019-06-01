@extends('admin.master.app')

@section('content')

<!-- Page Content -->
{{-- <div class="bg-image" style="background-image: url('/images/login-bg.jpg');"> --}}
<div class="bg-image">
    
    <div class="row mx-0 bg-black-op222">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end" style="background-image: url('/images/login-bg--.jpg'); background-size:cover; background-position:left center">
            <div class="p-30 invisible" data-toggle="appear">
                {{-- <p class="font-size-h3 font-w600 text-white">
                    Algún texto inspiracional.
                </p>
                <p class="font-italic text-white-op">
                    Copyright &copy; <span class="js-year-copy">2018</span>
                </p> --}}
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight222" >
            <div class="content content-full">
                <!-- Header -->
                <div class="px-30 py-10">
                    <a class="link-effect font-w700" href="index.php">
                        
                    </a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Main 1</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Administrador de Contenidos</h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->

                <form class="js-validation-signin px-30" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                               @if ($errors->has('email'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif

                                <label for="login-username">E-Mail</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif


                                <label for="login-password">Contraseña</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme en esta computadora
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                            <i class="si si-login mr-10"></i> Aceptar
                        </button>
                        <div class="mt-30">
                        {{--     <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="op_auth_signup2.php">
                                <i class="fa fa-plus mr-5"></i> Create Account
                            </a> --}}
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('password.request') }}">
                                <i class="fa fa-warning mr-5"></i> Olvidé mi contraseña
                            </a>
                        </div>
                    </div>
                </form>
                <!-- END Sign In Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection
