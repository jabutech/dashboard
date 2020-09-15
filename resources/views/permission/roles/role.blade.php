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
        <form action="{{ route('roles.create') }}" method="post">
            @csrf

            @include('permission.roles.partial.form-control',['submit' => 'Create'])

        </form>
    </div>
    </div><!-- /.card-body -->
</div>

<div class="card card-success card-outline">
    <div class="card-header">
    <h3 class="card-title">Table of Role</h3>
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
            @foreach ($roles as $index => $role)
                <tr>
                    <td>{{ $index +1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td>{{ $role->created_at->format("d F Y") }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#role-{{ $role->id }}">
                            Hapus
                        </button>
                        @include('permission.roles.delete')
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div><!-- /.card-body -->
</div>

@endsection
