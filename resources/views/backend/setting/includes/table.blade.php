<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_settings.table.key')</th>
        <th>@lang('backend_settings.table.exposed')</th>
        <th>@lang('backend_settings.table.created')</th>
        <th>@lang('backend_settings.table.last_updated')</th>
        <th>@lang('backend_settings.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($settings as $setting)
        <tr>
            <td class="align-middle"><a href="/admin/settings/{{ $setting->id }}">{{ $setting->key }}</a></td>
            <td><span class="badge badge-{{ $setting->exposed ? 'success' : 'danger' }}">{{ $setting->exposed ? __('Active') : __('Inactive') }}</span></td>
            <td class="align-middle">{!! $setting->created_at !!}</td>
            <td class="align-middle">{{ $setting->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $setting->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
