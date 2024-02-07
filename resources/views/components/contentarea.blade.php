@push('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

<div class="form-group">
    <label class="form-label">{{$title}}</label>
    <div id="editor">
        {!! old($name, $item) !!}
    </div>
    <textarea id="detail" name="{{$name}}" style="display: none" class="form-control @error($name) is-invalid @enderror">{!! old($name, $item) !!}</textarea>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

@push('js')
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="{{asset('assets/quill-image-resize-module.min.js')}}"></script>
    <script>
        var toolbarOptions = ['bold', 'italic', 'underline', 'strike'];
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                imageResize: {},
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'align': []
                    }],
                    ['link', 'image'],
                ]
            }
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            $('#detail').val(quill.container.firstChild.innerHTML);
        })
    </script>
@endpush


