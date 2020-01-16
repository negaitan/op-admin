@extends('backend.layouts.app')

@section('title', __('backend_flashs.labels.management') . ' | ' . __('backend_flashs.labels.view'))

@section('breadcrumb-links')
    @include('backend.flash.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('backend_flashs.labels.management')
                    <small class="text-muted">@lang('backend_flashs.labels.view')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-user"></i> @lang('backend_flashs.tabs.title')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">

                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.zona')</th>
                                        <td>{{ $flash->zona }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.nombrePlan')</th>
                                        <td>{{ $flash->name_plan }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.precioFlash')</th>
                                        <td>{{ $flash->precio_flash }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.labelFlash')</th>
                                        <td>{{ $flash->label_flash }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.precioEspecial')</th>
                                        <td>{{ $flash->precio_especial }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.labelEspecial')</th>
                                        <td>{{ $flash->label_especial }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.precioOnSale')</th>
                                        <td>{{ $flash->precio_onSale }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.labelOnSale')</th>
                                        <td>{{ $flash->label_onSale }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.precioRegular')</th>
                                        <td>{{ $flash->precio_regular }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_flashs.tabs.content.overview.labelRegular')</th>
                                        <td>{{ $flash->label_regular }}</td>
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
                    <strong>@lang('backend_flashs.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($flash->created_at) }} ({{ $flash->created_at->diffForHumans() }}),
                    <strong>@lang('backend_flashs.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($flash->updated_at) }} ({{ $flash->updated_at->diffForHumans() }})
                    @if($flash->trashed())
                        <strong>@lang('backend_flashs.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($flash->deleted_at) }} ({{ $flash->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
