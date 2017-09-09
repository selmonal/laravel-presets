@extends('layouts.app')

@section('content')
<div class="container grid-xs">
    <form method="POST" action="{{ route('login') }}">
         {{ csrf_field() }}

        <div class="panel">
            <div class="panel-header">
                <h5 class="panel-title">
                    Login
                </h5>
            </div>
            <div class="panel-body">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="form-label" for="email">E-Mail Address</label>
                    <input class="form-input" type="email" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus/>

                    @if ($errors->has('email'))
                        <span class="form-input-hint">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-input" type="password" name="password" placeholder="Password" value="{{ old('password') }}" required/>

                    @if ($errors->has('password'))
                        <span class="form-input-hint">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-switch">
                        <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }} />
                        <i class="form-icon"></i> Remember Me
                    </label>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
