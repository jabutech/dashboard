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
<div class="card card-primary card-outline">
    <div class="card-header">
    <h3 class="card-title">Create new Role</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('permissions.create') }}" method="post">
            @csrf

            @include('permission.permissions.partial.form-control',['submit' => 'Create'])

        </form>
    </div>
    </div><!-- /.card-body -->
</div>

<div class="card card-success card-outline">
    <div class="card-header">
    <h3 class="card-title">Table of Permission</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Guard Name</th>
                <th>Create At</th>
                <th>Action</th>
            </tr>
            @foreach ($permissions as $index => $permission)
                <tr>
                    <td>{{ $index +1 }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>{{ $permission->created_at->format("d F Y") }}</td>
                    <td>
                        <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#role-{{ $permission->id }}">
                            Hapus
                        </button>
                        @include('permission.permissions.delete')
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div><!-- /.card-body -->
</div>

@endsection
