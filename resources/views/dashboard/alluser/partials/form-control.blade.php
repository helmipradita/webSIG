<div class="mb-3">
    <label class="form-label" for="name">Nama Kategori</label>
    <input type="text" name="name" id="name" class="form-control">
    @error('name')
        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="slug">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control">
    @error('slug')
        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $submit }}</button>