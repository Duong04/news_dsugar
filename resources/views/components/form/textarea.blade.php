<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{$name}}">{{ $label }}</label>
    <textarea class="form-control" name="{{$name}}" id="{{$name}}" cols="30" rows="5" placeholder="{{ $label }}">{{ $value ? $value : old($name) }}</textarea>
    @if ($error)
        <span class="text-danger fs-7">{{ $error }}</span>
    @endif
</div>