@extends('layouts.app')

@section('content')
<div class="container grid-xs">
    <form method="POST" action="{{ route('password.email') }}">
         {{ csrf_field() }}

        <div class="panel">
            <div class="panel-header">
                <h5 class="panel-title">
                    Reset Password
                </h5>
            </div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="toast toast-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="form-label" for="email">E-Mail Address</label>
                    <input class="form-input" type="email" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus/>

                    @if ($errors->has('email'))
                        <span class="form-input-hint">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
