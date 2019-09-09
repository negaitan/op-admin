@php
    $menuItems = ['amenity', 'class_group', 'club', 'gym_class', 'image', 'plan', 'setting', 'web_text'];
@endphp

@foreach ($menuItems as $item)
    @include('backend.'.$item.'.includes.sidebar-'.Str::plural($item))
@endforeach
