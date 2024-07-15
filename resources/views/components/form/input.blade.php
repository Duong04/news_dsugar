<div class="mt-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <div class="d-flex align-items-center position-relative">
        <input value="{{ old($name) }}" type="{{ $type }}" placeholder="{{ $label }}" id="{{ $name }}" name="{{ $name }}" class="form-control form-inp p-2">
        <span class="position-absolute" style="right: 10px; cursor: pointer;"><i class="{{ $icon }}"></i></span>
    </div>
    @if ($error)
        <span class="text-danger fs-7">{{ $error }}</span>
    @endif
</div>