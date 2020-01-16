@extends('backend.layouts.app')

@section('title', __('backend_flashs.labels.management') . ' | ' . __('backend_flashs.labels.create'))

@section('breadcrumb-links')
    @include('backend.flash.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->form('POST', route('admin.flashs.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('backend_flashs.labels.management')
                        <small class="text-muted">@lang('backend_flashs.labels.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            @include('backend.flash.includes.form')

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.flashs.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
