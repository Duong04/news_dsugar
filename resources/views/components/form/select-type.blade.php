<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="form-label">Type cho Role</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}">
        <option value="">Type</option>
        <option {{old($name) == 'System' || $value == 'System' ? 'selected' : ''}} value="System">Hệ thống</option>
        <option {{old($name) == 'Admin' || $value == 'Admin' ? 'selected' : ''}} value="Admin">Quản trị</option>
        <option {{old($name) == 'Content' || $value == 'Content' ? 'selected' : ''}} value="Content">Nội dung</option>
        <option {{old($name) == 'User' || $value == 'User' ? 'selected' : ''}} value="User">Người dùng</option>
    </select>
</div>