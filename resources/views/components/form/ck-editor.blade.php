<div class="{{$class}}{{ $error ? ' has-error' : '' }}">
    @if ($error)
        <span class="text-danger fs-7">{{ $error }}</span>
    @endif
    <textarea id="editor" name="{{$name}}" placeholder="{{$label}}" class="ck-editor w-100">{{ $value ? $value : old($name) }}</textarea>
</div>