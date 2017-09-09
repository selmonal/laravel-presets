@extends('layouts.app')

@section('content')
<div class="container grid-lg">
    <div class="panel">
        <div class="panel-header">
            <h5 class="panel-title">
                Dashboard
            </h5>
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="toast toast-success">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
        <div class="panel-footer">
            
        </div>
    </div>
</div>
@endsection
