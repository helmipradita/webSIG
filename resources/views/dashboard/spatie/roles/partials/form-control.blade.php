<div class="mb-3">
    <label class="form-label" for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $role->name }}">
    @error('name')
        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="guard_name">Guard Name</label>
    <input type="text" name="guard_name" id="guard_name" class="form-control" value="{{ old('guard_name') ?? $role->guard_name }}" disabled>
</div>
<button type="submit" class="btn btn-primary">{{ $submit }}</button>