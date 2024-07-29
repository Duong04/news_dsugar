<div class="form-group {{$class}}{{ $error ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="form-label">Type cho Role</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}">
        <option value="">Type</option>
        @foreach ($typeRole as $item)
        <option {{old($name) == $item->id || $value == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>