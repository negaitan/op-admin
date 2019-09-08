<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_class_groups.table.name')</th>
        <th>@lang('backend_class_groups.table.created')</th>
        <th>@lang('backend_class_groups.table.last_updated')</th>
        <th>@lang('backend_class_groups.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($classGroups as $classGroup)
        <tr>
            <td class="align-middle"><a href="/admin/class_groups/{{ $classGroup->id }}">{{ $classGroup->name }}</a></td>
            <td class="align-middle">{!! $classGroup->created_at !!}</td>
            <td class="align-middle">{{ $classGroup->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $classGroup->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
