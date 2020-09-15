<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') ?? $role->name }}" class="form-control">
    @error('name')
        <div class="text-danger mt-2 d-block">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="guard_name">Guard Name</label>
    <input type="text" name="guard_name" id="guard_name" value="{{ old('guard_name') ?? $role->guard_name }}" class="form-control" placeholder='default to "web"'>
</div>

<button type="submit" class="btn btn-primary">{{ $submit }}</button>