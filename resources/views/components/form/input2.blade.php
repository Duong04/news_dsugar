<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{$name}}">{{ $label }}</label>
    <input
        value="{{ $value ? $value : old($name) }}"
        type="{{ $type }}"
        class="form-control"
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $label }}"
    />
    @if ($error)
        <span class="text-danger fs-7">{{ $error }}</span>
    @endif
</div>