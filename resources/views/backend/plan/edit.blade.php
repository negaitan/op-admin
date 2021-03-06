@extends('backend.layouts.app')

@section('title', __('backend_plans.labels.management') . ' | ' . __('backend_plans.labels.edit'))

@section('breadcrumb-links')
    @include('backend.plan.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($plan, 'PATCH', route('admin.plans.update', $plan->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('backend_plans.labels.management')
                        <small class="text-muted">@lang('backend_plans.labels.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            @include('backend.plan.includes.form')

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.plans.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
