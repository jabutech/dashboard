@extends('layouts.global')

@section('title')
    Permission
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href="{{ route('permissions.index') }}" class="btn btn-success">Back</a>
<br><br>
<div class="card card-primary card-outline">
    <div class="card-header">
    <h3 class="card-title">Edit Permission</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('permissions.edit', $permission) }}" method="post">
            @csrf
            @method('PUT')

            @include('permission.permissions.partial.form-control')

        </form>
    </div>
    </div>
</div>


@endsection
