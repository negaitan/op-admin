<table class="table">
    <thead>
    <tr>
        <th>@lang('backend_plans.table.name')</th>
        <th>@lang('backend_plans.table.price_month')</th>
        <th>@lang('backend_plans.table.created')</th>
        <th>@lang('backend_plans.table.last_updated')</th>
        <th>@lang('backend_plans.table.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($plans as $plan)
        <tr>
            <td class="align-middle"><a href="/admin/plans/{{ $plan->id }}">{{ $plan->name }}</a></td>
            <td class="align-middle">$ {{ $plan->price_month }}</td>
            <td class="align-middle">{!! $plan->created_at !!}</td>
            <td class="align-middle">{{ $plan->updated_at->diffForHumans() }}</td>
            <td class="align-middle">{!! $plan->action_buttons !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
