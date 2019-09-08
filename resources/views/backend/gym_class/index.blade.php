@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('backend_gym_classes.labels.management'))

@section('breadcrumb-links')
    @include('backend.gym_class.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('backend_gym_classes.labels.management') }} <small class="text-muted">{{ __('backend_gym_classes.labels.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.gym_class.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    @include('backend.gym_class.includes.table')
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $gymClasses->count() !!} {{ trans_choice('backend_gym_classes.table.total', $gymClasses->count()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $gymClasses->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
