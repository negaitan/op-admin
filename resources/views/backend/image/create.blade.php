@extends('backend.layouts.app')

@section('title', __('backend_images.labels.management') . ' | ' . __('backend_images.labels.create'))

@section('breadcrumb-links')
    @include('backend.image.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->form('POST', route('admin.images.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('backend_images.labels.management')
                        <small class="text-muted">@lang('backend_images.labels.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            @include('backend.image.includes.form')

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.images.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
