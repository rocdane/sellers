@php
    $route ??= '';
    $name ??= 'data';
    $data ??= null;
    $method ??= 'post';
    $class ??= 'edit';
    $icon ??= 'fa fa-pencil';
@endphp

<form action="{{route($route, [$name => $data])}}" method="post">
    @csrf
    @method("{{$method}}")
    <button class="{{$class}}" type="submit">
        <i class="{{$icon}}"></i>
    </button>
</form>