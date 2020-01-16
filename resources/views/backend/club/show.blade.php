@extends('backend.layouts.app')

@section('title', __('backend_clubs.labels.management') . ' | ' . __('backend_clubs.labels.view'))

@section('breadcrumb-links')
    @include('backend.club.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('backend_clubs.labels.management')
                    <small class="text-muted">@lang('backend_clubs.labels.view')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-user"></i> @lang('backend_clubs.tabs.title')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">

                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>@lang('backend_clubs.tabs.content.overview.name')</th>
                                        <td>{{ $club->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_clubs.tabs.content.overview.web_text')</th>
                                        <td>{{ $club->webText->key }}: {{ $club->webText->value }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_clubs.tabs.content.overview.address')</th>
                                        <td>{{ $club->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_clubs.tabs.content.overview.opening_time')</th>
                                        <td>{{ $club->opening_time }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_clubs.tabs.content.overview.latitude')</th>
                                        <td>{{ $club->latitude }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_clubs.tabs.content.overview.longitude')</th>
                                        <td>{{ $club->longitude }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_clubs.tabs.content.overview.plans')</th>
                                        <td>
                                            <ul>
                                                @foreach ($club->plans as $plan)
                                                    <li><b>{{ $plan->name }}:</b> $ {{ $plan->price_month }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('backend_clubs.tabs.content.overview.amenities')</th>
                                        <td>{{ $club->amenities }}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('backend_clubs.tabs.content.overview.images')</th>
                                        <td>
                                            @foreach ($club->images as $image)
                                                <img src="{{ $image->url }}" alt="{{ $image->alt }}" class="img-fluid img-thumbnail">
                                            @endforeach
                                        </td>
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
                    <strong>@lang('backend_clubs.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($club->created_at) }} ({{ $club->created_at->diffForHumans() }}),
                    <strong>@lang('backend_clubs.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($club->updated_at) }} ({{ $club->updated_at->diffForHumans() }})
                    @if($club->trashed())
                        <strong>@lang('backend_clubs.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($club->deleted_at) }} ({{ $club->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
