@php
    $menuItems = [ 'setting', 'web_text', 'image',  'club', 'class_group', 'class_name', 'gym_class',  'plan',  'flash'];
@endphp

@foreach ($menuItems as $item)
        @include('backend.'.$item.'.includes.sidebar-'.Str::plural($item))
@endforeach
    