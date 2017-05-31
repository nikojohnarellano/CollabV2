@extends('layouts.auth')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <span style="color:white; font-size:80px;">Collab</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6 tabs">
                            <a href="#" class="active" id="login-form-link"><div class="login">LOGIN</div></a>
                        </div>
                        <div class="col-xs-6 tabs">
                            <a href="#" id="register-form-link"><div class="register">REGISTER</div></a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" role="form" method="POST" action="{{ route('login') }}">
                                {{csrf_field()}}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                    <input id="email" tabindex="1" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">Password</label>
                                    <a tabindex="3" class="pull-right btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                    <input id="password" tabindex="1" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-xs-6 form-group pull-left checkbox">
                                    <input tabindex="4" id="checkbox1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="checkbox1">Remember Me</label>
                                </div>
                                <div class="col-xs-6 form-group pull-right">
                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                </div>

                            </form>
                            <form id="register-form" action="/register" method="POST" role="form" style="display:none;">
                                {{csrf_field()}}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email-reg') ? ' has-error' : '' }}">
                                    <input type="email" name="email-reg" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="{{ old('email') }}">
                                    @if ($errors->has('email-reg'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email-reg') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password-reg') ? ' has-error' : '' }}">
                                    <input type="password" name="password-reg" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    @if ($errors->has('password-reg'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password-reg') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password-confirm" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection