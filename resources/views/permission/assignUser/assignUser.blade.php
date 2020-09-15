@extends('layouts.global')

@section('title')
Sync to Users 
@endsection

@section('links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
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
    <h3 class="card-title">Role to Users</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('assign.user.index') }}" method="post">
            @csrf
            
            <div class="form-group">
                <label for="user">User</label>
                <input type="text" name="username" id="username" class="form-control">
                @error('username')
                    <div class="text-danger mt-2 d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="user">User</label>
                <select name="roles[]" id="roles" class="form-control select2" multiple>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('roles')
                    <div class="text-danger mt-2 d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header">
    <h3 class="card-title">Table of Role to Users</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>The Roles</th>
                <th>Action</th>
            </tr>

            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                    <td><a href="{{ route('assign.user.edit', $user) }}" class="btn btn-warning btn-sm">Sync</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
</div>

@endsection
