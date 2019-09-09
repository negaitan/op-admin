@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('backend_amenities.labels.management'))

@section('breadcrumb-links')
    @include('backend.amenity.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('backend_amenities.labels.management') }} <small class="text-muted">{{ __('backend_amenities.labels.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.amenity.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    @include('backend.amenity.includes.table')
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $amenities->count() !!} {{ trans_choice('backend_amenities.table.total', $amenities->count()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $amenities->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
