<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_gym_classes.table.name')</th>
        <th>@lang('backend_gym_classes.table.teacher')</th>
        <th>@lang('backend_gym_classes.table.club')</th>
        <th>@lang('backend_gym_classes.table.created')</th>
        <th>@lang('backend_gym_classes.table.last_updated')</th>
        <th>@lang('backend_gym_classes.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($gymClasses as $gymClass)
        <tr>
            <td class="align-middle"><a href="/admin/gym_classes/{{ $gymClass->id }}">{{ $gymClass->className->key }}</a></td>
            <td class="align-middle">{{ $gymClass->teacher }}</td>
            <td class="align-middle">{{ $gymClass->club->name }}</td>
            <td class="align-middle">{!! $gymClass->created_at !!}</td>
            <td class="align-middle">{{ $gymClass->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $gymClass->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
