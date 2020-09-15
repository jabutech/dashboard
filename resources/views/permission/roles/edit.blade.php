@extends('layouts.global')

@section('title')
    Role
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href="{{ route('roles.index') }}" class="btn btn-success">Back</a>
<br><br>
<div class="card card-primary card-outline">
    <div class="card-header">
    <h3 class="card-title">Edit Role</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('roles.edit', $role) }}" method="post">
            @csrf
            @method('PUT')

            @include('permission.roles.partial.form-control')

        </form>
    </div>
    </div>
</div>


@endsection
