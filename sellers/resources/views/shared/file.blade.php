@php
    $label ??= ucfirst($name);
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

<div @class(['form-group','choose-file', $class])>
    <label for="{{$name}}">{{$label}}</label>
    <input type="file" id="{{$name}}" name="{{$name}}" class="form-control form-control-file d-inline @error($name) is-invalid @enderror">
    @error($name) <div class="invalid-feedback">{{$message}}</div> @enderror
</div>
