<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_class_names.table.key')</th>
        <th>@lang('backend_class_names.table.exposed')</th>
        <th>@lang('backend_class_names.table.created')</th>
        <th>@lang('backend_class_names.table.last_updated')</th>
        <th>@lang('backend_class_names.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($classNames as $class_name)
        <tr>
            <td class="align-middle"><a href="/admin/class_names/{{ $class_name->id }}">{{ $class_name->key }}</a></td>
            <td><span class="badge badge-{{ $class_name->exposed ? 'success' : 'danger' }}">{{ $class_name->exposed ? __('Active') : __('Inactive') }}</span></td>
            <td class="align-middle">{!! $class_name->created_at !!}</td>
            <td class="align-middle">{{ $class_name->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $class_name->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
