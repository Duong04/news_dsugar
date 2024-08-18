<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="form-label">Trạng thái bài viết</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}">
        <option value="">Trạng thái</option>
        <option {{old($name) == 'draft' || $value == 'draft' ? 'selected' : ''}} value="draft">Bản nháp</option>
        <option {{old($name) == 'archived' || $value == 'archived' ? 'selected' : ''}} value="archived">Lưu trữ</option>
        <option {{old($name) == 'published' || $value == 'published' ? 'selected' : ''}} value="published">Xuất bản</option>
        @if ($method == 'put')
        <option {{old($name) == 'pending' || $value == 'pending' ? 'selected' : ''}} value="pending">Chờ kiểm duyệt</option>
        <option {{old($name) == 'rejected' || $value == 'rejected' ? 'selected' : ''}} value="rejected">Đã từ chối</option>
        @endif
    </select>
</div>