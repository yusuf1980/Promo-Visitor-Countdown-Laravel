<div class="form-group">
    <label class="form-label">{{ $title }}</label>
    <textarea name="{{ $name }}" cols="30" rows="2" class="form-control @error($name) is-invalid @enderror">{{ old($name, $item) }}</textarea>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
