<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="form-label">Trạng thái</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}">
        <option value="">Trạng thái</option>
        <option {{old($name) == 'active' || $value == 'active' ? 'selected' : ''}} value="active">Kích hoạt</option>
        <option {{old($name) == 'inactive' || $value == 'inactive' ? 'selected' : ''}} value="inactive">Chưa kích hoạt</option>
        <option {{old($name) == 'disabled' || $value == 'disabled' ? 'selected' : ''}} value="disabled">Vô hiệu hóa</option>
    </select>
</div>