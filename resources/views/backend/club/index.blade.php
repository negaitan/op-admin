@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('backend_clubs.labels.management'))

@section('breadcrumb-links')
    @include('backend.club.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('backend_clubs.labels.management') }} <small class="text-muted">{{ __('backend_clubs.labels.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.club.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('backend_clubs.table.title')</th>
                            <th>@lang('backend_clubs.table.created')</th>
                            <th>@lang('backend_clubs.table.last_updated')</th>
                            <th>@lang('backend_clubs.table.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clubs as $club)
                            <tr>
                                <td class="align-middle"><a href="/admin/clubs/{{ $club->id }}">{{ $club->title }}</a></td>
                                <td class="align-middle">{!! $club->created_at !!}</td>
                                <td class="align-middle">{{ $club->updated_at->diffForHumans() }}</td>
                                <td class="align-middle">{!! $club->action_buttons !!}</td>
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
                    {!! $clubs->count() !!} {{ trans_choice('backend_clubs.table.total', $clubs->count()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $clubs->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
