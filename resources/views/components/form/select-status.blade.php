<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="form-label">Trạng thái bài viết</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}">
        <option value="">Trạng thái</option>
        <option value="Draft">Draft</option>
        <option value="Publish">Publish</option>
    </select>
</div>