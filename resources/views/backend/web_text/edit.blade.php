@extends('backend.layouts.app')

@section('title', __('backend_web_texts.labels.management') . ' | ' . __('backend_web_texts.labels.edit'))

@section('breadcrumb-links')
    @include('backend.web_text.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($webText, 'PATCH', route('admin.web_texts.update', $webText->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('backend_web_texts.labels.management')
                        <small class="text-muted">@lang('backend_web_texts.labels.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            @include('backend.web_text.includes.form')

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.web_texts.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
