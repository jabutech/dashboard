@extends('layouts.global')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="card card-default color-palette-box">
    <div class="card-body">
        @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
    </div>
</div>
@endsection
