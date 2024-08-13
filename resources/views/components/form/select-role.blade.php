<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control">
        <option value="">Vui lòng chọn vai trò</option>
        @foreach ($roles as $item)
            @if ($item->name !== 'Super Admin')
            <option {{old($name) == $item->id || $id && $id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
            @endif
        @endforeach
    </select>
    @if ($error)
        <span class="text-danger fs-7">{{ $error }}</span>
    @endif
</div>