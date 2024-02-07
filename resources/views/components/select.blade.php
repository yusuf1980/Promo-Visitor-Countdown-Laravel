<div class="form-group">
    <label class="form-label">{{$title}}</label>
    <select name="{{$name}}" class="form-control @error($name) is-invalid @enderror">
        <option value="">{{$title}}</option>
        @foreach($data as $k => $v)
            <option value="{{$v}}" {{$item == $v?'selected': ''}}>{{$k}}</option>
        @endforeach
    </select>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
