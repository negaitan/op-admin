@extends('backend.layouts.app')

@section('title', __('backend_amenities.labels.management') . ' | ' . __('backend_amenities.labels.view'))

@section('breadcrumb-links')
    @include('backend.amenity.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('backend_amenities.labels.management')
                    <small class="text-muted">@lang('backend_amenities.labels.view')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-user"></i> @lang('backend_amenities.tabs.title')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">

                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>@lang('backend_amenities.tabs.content.overview.title')</th>
                                        <td>{{ $amenity->title }}</td>
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
                    <strong>@lang('backend_amenities.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($amenity->created_at) }} ({{ $amenity->created_at->diffForHumans() }}),
                    <strong>@lang('backend_amenities.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($amenity->updated_at) }} ({{ $amenity->updated_at->diffForHumans() }})
                    @if($amenity->trashed())
                        <strong>@lang('backend_amenities.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($amenity->deleted_at) }} ({{ $amenity->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
