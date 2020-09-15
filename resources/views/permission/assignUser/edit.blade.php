@extends('layouts.global')

@section('title')
    Edit Sync to Users 
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
<a href="{{ route('assign.user.index') }}" class="btn btn-success">Back</a><br><br>
<div class="card card-primary card-outline mb-3">
    <div class="card-header">
    <h3 class="card-title">Sync to Users for {{ $user->name }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('assign.user.edit', $user) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user">User</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}">
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
                        <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('roles')
                    <div class="text-danger mt-2 d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Sync</button>
        </form>
    </div>
    </div>
</div>

@endsection
