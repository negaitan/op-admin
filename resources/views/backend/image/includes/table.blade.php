<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_images.table.internal_key')</th>
        <th>@lang('backend_images.table.created')</th>
        <th>@lang('backend_images.table.last_updated')</th>
        <th>@lang('backend_images.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($images as $image)
        <tr>
            <td class="align-middle"><a href="/admin/images/{{ $image->id }}">{{ $image->internal_key }}</a></td>
            <td class="align-middle">{!! $image->created_at !!}</td>
            <td class="align-middle">{{ $image->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $image->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
