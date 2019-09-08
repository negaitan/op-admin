@extends('backend.layouts.app')

@section('title', __('backend_web_texts.labels.management') . ' | ' . __('backend_web_texts.labels.view'))

@section('breadcrumb-links')
    @include('backend.web_text.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('backend_web_texts.labels.management')
                    <small class="text-muted">@lang('backend_web_texts.labels.view')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-user"></i> @lang('backend_web_texts.tabs.title')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">

                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>@lang('backend_settings.tabs.content.overview.key')</th>
                                        <td>{{ $webText->key }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_settings.tabs.content.overview.value')</th>
                                        <td>{{ $webText->value }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_settings.tabs.content.overview.exposed')</th>
                                        <td><span class="badge badge-{{ $webText->exposed ? 'success' : 'danger' }}">{{ $webText->exposed ? __('Active') : __('Inactive') }}</span></td>
                                    </tr>
                                </table>
                            </div><!--table-responsive-->
                        </div><!--col-->

                    </div><!--tab-->
                </div><!--tab-content-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>@lang('backend_web_texts.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($webText->created_at) }} ({{ $webText->created_at->diffForHumans() }}),
                    <strong>@lang('backend_web_texts.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($webText->updated_at) }} ({{ $webText->updated_at->diffForHumans() }})
                    @if($webText->trashed())
                        <strong>@lang('backend_web_texts.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($webText->deleted_at) }} ({{ $webText->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
