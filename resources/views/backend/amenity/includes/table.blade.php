<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_amenities.table.key')</th>
        <th>@lang('backend_amenities.table.created')</th>
        <th>@lang('backend_amenities.table.last_updated')</th>
        <th>@lang('backend_amenities.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($amenities as $amenity)
        <tr>
            <td class="align-middle"><a href="/admin/amenities/{{ $amenity->id }}">{{ $amenity->key }}</a></td>
            <td class="align-middle">{!! $amenity->created_at !!}</td>
            <td class="align-middle">{{ $amenity->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $amenity->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
