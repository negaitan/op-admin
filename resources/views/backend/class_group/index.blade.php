@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('backend_class_groups.labels.management'))

@section('breadcrumb-links')
    @include('backend.class_group.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('backend_class_groups.labels.management') }} <small class="text-muted">{{ __('backend_class_groups.labels.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.class_group.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('backend_class_groups.table.title')</th>
                            <th>@lang('backend_class_groups.table.created')</th>
                            <th>@lang('backend_class_groups.table.last_updated')</th>
                            <th>@lang('backend_class_groups.table.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classGroups as $classGroup)
                            <tr>
                                <td class="align-middle"><a href="/admin/class_groups/{{ $classGroup->id }}">{{ $classGroup->title }}</a></td>
                                <td class="align-middle">{!! $classGroup->created_at !!}</td>
                                <td class="align-middle">{{ $classGroup->updated_at->diffForHumans() }}</td>
                                <td class="align-middle">{!! $classGroup->action_buttons !!}</td>
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
                    {!! $classGroups->count() !!} {{ trans_choice('backend_class_groups.table.total', $classGroups->count()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $classGroups->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
