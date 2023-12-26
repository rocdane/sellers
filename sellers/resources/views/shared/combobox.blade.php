@php
    $label ??= ucfirst($name);
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

<div @class(['form-group', $class])>
    <label for="{{$name}}">{{$label}}</label>
    <select class="form-control @error($name) is-invalid @enderror" name="{{$name}}" id="{{$name}}">
        @foreach ($data as $k => $v)
            <option value="{{$k}}">{{$v}}</option>
        @endforeach
    </select>
    
    @error($name) <div class="invalid-feedback">{{$message}}</div> @enderror
</div>