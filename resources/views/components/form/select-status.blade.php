<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="form-label">Trạng thái bài viết</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}">
        <option value="">Trạng thái</option>
        <option value="draft">Bản nháp</option>
        <option value="archived">Lưu trữ</option>
        <option value="published">Xuất bản</option>
    </select>
</div>