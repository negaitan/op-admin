@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('backend_settings.labels.management'))

@section('breadcrumb-links')
    @include('backend.setting.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('backend_settings.labels.management') }} <small class="text-muted">{{ __('backend_settings.labels.deleted') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.setting.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('backend_settings.table.title')</th>
                            <th>@lang('backend_settings.table.created')</th>
                            <th>@lang('backend_settings.table.deleted')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($settings as $setting)
                            <tr>
                                <td class="align-middle"><a href="/admin/settings/{{ $setting->id }}">{{ $setting->title }}</a></td>
                                <td class="align-middle">{!! $setting->created_at !!}</td>
                                <td class="align-middle">{{ $setting->deleted_at->diffForHumans() }}</td>
                                <td class="align-middle">{!! $setting->trashed_buttons !!}</td>
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
                    {!! $settings->count() !!} {{ trans_choice('backend_settings.table.total', $settings->count()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $settings->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
