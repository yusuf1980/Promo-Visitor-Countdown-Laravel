<div class="form-group">
    <label class="form-label">{{$title}}</label>
    <input type="{{$type}}" name="{{$name}}" step="0.01" 
        class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $item) }}"
        autocomplete="{{$name}}" >
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
