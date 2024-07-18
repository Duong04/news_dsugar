<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="form-label">Trạng thái bài viết</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}">
        <option value="">Trạng thái</option>
        <option {{old($name) == 'draft' ? 'selected' : ''}} value="draft">Bản nháp</option>
        <option {{old($name) == 'archived' ? 'selected' : ''}} value="archived">Lưu trữ</option>
        <option {{old($name) == 'published' ? 'selected' : ''}} value="published">Xuất bản</option>
    </select>
</div>