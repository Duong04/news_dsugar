<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <select data-id="{{ $id }}" name="{{ $name }}" id="{{ $name }}" class="form-control {{ $classChild }}">
        <option value="">Vui lòng chọn danh mục</option>
        @isset($categories)
            @foreach ($categories as $item)
                <option {{old($name) == $item->id || $id && $id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        @endisset
    </select>
    @if ($error)
        <span class="text-danger fs-7">{{ $error }}</span>
    @endif
</div>