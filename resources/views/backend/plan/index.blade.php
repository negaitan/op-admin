@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('backend_plans.labels.management'))

@section('breadcrumb-links')
    @include('backend.plan.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('backend_plans.labels.management') }} <small class="text-muted">{{ __('backend_plans.labels.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.plan.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('backend_plans.table.title')</th>
                            <th>@lang('backend_plans.table.created')</th>
                            <th>@lang('backend_plans.table.last_updated')</th>
                            <th>@lang('backend_plans.table.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plans as $plan)
                            <tr>
                                <td class="align-middle"><a href="/admin/plans/{{ $plan->id }}">{{ $plan->title }}</a></td>
                                <td class="align-middle">{!! $plan->created_at !!}</td>
                                <td class="align-middle">{{ $plan->updated_at->diffForHumans() }}</td>
                                <td class="align-middle">{!! $plan->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $plans->count() !!} {{ trans_choice('backend_plans.table.total', $plans->count()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $plans->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
