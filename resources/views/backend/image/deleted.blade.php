@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('backend_images.labels.management'))

@section('breadcrumb-links')
    @include('backend.image.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('backend_images.labels.management') }} <small class="text-muted">{{ __('backend_images.labels.deleted') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.image.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('backend_images.table.title')</th>
                            <th>@lang('backend_images.table.created')</th>
                            <th>@lang('backend_images.table.deleted')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                            <tr>
                                <td class="align-middle"><a href="/admin/images/{{ $image->id }}">{{ $image->title }}</a></td>
                                <td class="align-middle">{!! $image->created_at !!}</td>
                                <td class="align-middle">{{ $image->deleted_at->diffForHumans() }}</td>
                                <td class="align-middle">{!! $image->trashed_buttons !!}</td>
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
                    {!! $images->count() !!} {{ trans_choice('backend_images.table.total', $images->count()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $images->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
