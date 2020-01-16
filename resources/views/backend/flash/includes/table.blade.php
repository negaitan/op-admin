<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_flashs.table.zona')</th>
        <th>@lang('backend_flashs.table.nombrePlan')</th>
        <th>@lang('backend_flashs.table.created')</th>
        <th>@lang('backend_flashs.table.last_updated')</th>
        <th>@lang('backend_flashs.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($flashs as $flash)
        <tr>
            <td class="align-middle"><a href="/admin/flashs/{{ $flash->id }}">{{ $flash->zona }}</a></td>
            <td class="align-middle">{{ $flash->name_plan }}</td>
            <td class="align-middle">{!! $flash->created_at !!}</td>
            <td class="align-middle">{{ $flash->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $flash->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
