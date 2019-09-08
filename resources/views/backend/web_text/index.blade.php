@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('backend_web_texts.labels.management'))

@section('breadcrumb-links')
    @include('backend.web_text.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('backend_web_texts.labels.management') }} <small class="text-muted">{{ __('backend_web_texts.labels.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.web_text.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('backend_web_texts.table.title')</th>
                            <th>@lang('backend_web_texts.table.created')</th>
                            <th>@lang('backend_web_texts.table.last_updated')</th>
                            <th>@lang('backend_web_texts.table.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($webTexts as $webText)
                            <tr>
                                <td class="align-middle"><a href="/admin/web_texts/{{ $webText->id }}">{{ $webText->title }}</a></td>
                                <td class="align-middle">{!! $webText->created_at !!}</td>
                                <td class="align-middle">{{ $webText->updated_at->diffForHumans() }}</td>
                                <td class="align-middle">{!! $webText->action_buttons !!}</td>
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
                    {!! $webTexts->count() !!} {{ trans_choice('backend_web_texts.table.total', $webTexts->count()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $webTexts->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
