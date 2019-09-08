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
                    {{ __('backend_gym_classes.labels.management') }} <small class="text-muted">{{ __('backend_gym_classes.labels.deleted') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.gym_class.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('backend_gym_classes.table.title')</th>
                            <th>@lang('backend_gym_classes.table.created')</th>
                            <th>@lang('backend_gym_classes.table.deleted')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gymClasses as $gymClass)
                            <tr>
                                <td class="align-middle"><a href="/admin/gym_classes/{{ $gymClass->id }}">{{ $gymClass->title }}</a></td>
                                <td class="align-middle">{!! $gymClass->created_at !!}</td>
                                <td class="align-middle">{{ $gymClass->deleted_at->diffForHumans() }}</td>
                                <td class="align-middle">{!! $gymClass->trashed_buttons !!}</td>
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
