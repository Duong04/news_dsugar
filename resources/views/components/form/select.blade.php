<div class="form-group col-6">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control">
      <option value="">Vui lòng chọn danh mục</option>
      @foreach ($categories as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
      @endforeach
    </select>
    @if ($error)
        <span class="text-danger fs-7">{{ $error }}</span>
    @endif
</div>