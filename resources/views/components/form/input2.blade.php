<div class="form-group col-6{{ $error ? ' has-error' : '' }}">
    <label for="{{$name}}">{{ $label }}</label>
    <input
        value="{{ old($name) }}"
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