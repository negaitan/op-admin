<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_clubs.table.name')</th>
        <th>@lang('backend_clubs.table.created')</th>
        <th>@lang('backend_clubs.table.last_updated')</th>
        <th>@lang('backend_clubs.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clubs as $club)
        <tr>
            <td class="align-middle"><a href="/admin/clubs/{{ $club->id }}">{{ $club->name }}</a></td>
            <td class="align-middle">{!! $club->created_at !!}</td>
            <td class="align-middle">{{ $club->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $club->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
