@extends('backend.layouts.app')

@section('title', __('backend_amenities.labels.management') . ' | ' . __('backend_amenities.labels.edit'))

@section('breadcrumb-links')
    @include('backend.amenity.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($amenity, 'PATCH', route('admin.amenities.update', $amenity->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('backend_amenities.labels.management')
                        <small class="text-muted">@lang('backend_amenities.labels.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            @include('backend.amenity.includes.form')

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.amenities.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
