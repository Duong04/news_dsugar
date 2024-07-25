<div class="col-auto ms-3 d-flex align-items-center">
    <label class="colorinput me-2">
        <input id="{{ $id }}" name="{{ $name }}" type="checkbox" value="{{$value}}" {{$checked ? 'checked' : '' }} class="colorinput-input {{ $className }}" />
        <span class="colorinput-color bg-info"></span>
    </label>
    <label for="{{ $id }}">{{$label}}</label>
</div>