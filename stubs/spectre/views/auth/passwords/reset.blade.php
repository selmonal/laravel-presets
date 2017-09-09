@extends('layouts.app')

@section('content')
<div class="container grid-xs">
    <form method="POST" action="{{ route('password.request') }}">
         {{ csrf_field() }}

         <input type="hidden" name="token" value="{{ $token }}">

        <div class="panel">
            <div class="panel-header">
                <h5 class="panel-title">
                    Reset Password
                </h5>
            </div>
            <div class="panel-body">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="form-label" for="email">E-Mail Address</label>
                    <input class="form-input" type="email" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required/>

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

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input class="form-input" type="password" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}" required/>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
