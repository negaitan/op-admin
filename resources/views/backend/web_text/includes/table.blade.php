<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_web_texts.table.key')</th>
        <th>@lang('backend_web_texts.table.exposed')</th>
        <th>@lang('backend_web_texts.table.created')</th>
        <th>@lang('backend_web_texts.table.last_updated')</th>
        <th>@lang('backend_web_texts.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($webTexts as $web_text)
        <tr>
            <td class="align-middle"><a href="/admin/web_texts/{{ $web_text->id }}">{{ $web_text->key }}</a></td>
            <td><span class="badge badge-{{ $web_text->exposed ? 'success' : 'danger' }}">{{ $web_text->exposed ? __('Active') : __('Inactive') }}</span></td>
            <td class="align-middle">{!! $web_text->created_at !!}</td>
            <td class="align-middle">{{ $web_text->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $web_text->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
