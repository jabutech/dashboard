@extends('layouts.global')

@section('title')
    Role
@endsection

@section('links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    {{-- initialiaze select 2 --}}
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Permissions"
            });
        });
    </script>
@endpush

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card card-primary card-outline mb-3">
    <div class="card-header">
    <h3 class="card-title">Assign Permission</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('assign.index') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="role">Role Name</label>
                <select type="text" name="role" id="role" class="form-control">
                    <option disabled selected>-- Pilih Role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <div class="text-danger mt-2 d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="permissions">Permissions</label>
                <select name="permissions[]" id="permissions" class="form-control select2" multiple>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
                @error('permissions')
                <div class="text-danger mt-2 d-block">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header">
    <h3 class="card-title">Table of Role & Permission</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Guard Name</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>

            @foreach ($roles as $index => $role)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td>{{ implode(', ', $role->getPermissionNames()->toArray()) }}</td>
                    <td><a href="{{ route('assign.edit', $role) }}" class="btn btn-warning btn-sm">Sync</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
</div>
@endsection
