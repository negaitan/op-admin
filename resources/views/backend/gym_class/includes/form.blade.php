@php
    $choosed_week_days = !isset($gymClass) ? [] : $gymClass->week_days;
@endphp

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_gym_classes.validation.attributes.club'))->class('col-md-2 form-control-label')->for('club_id') }}

            <div class="col-md-10">
                {{ html()->select('club_id', $clubs->pluck('name','id'))
                    ->class('form-control')
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->


<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_names.tabs.content.overview.key'))->class('col-md-2 form-control-label')->for('class_name_id') }}

            <div class="col-md-10">
                {{ html()->select('class_name_id', $class_names->pluck('key','id'))
                    ->class('form-control')
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->



<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_gym_classes.validation.attributes.teacher'))->class('col-md-2 form-control-label')->for('teacher') }}

            <div class="col-md-10">
                {{ html()->text('teacher')
                    ->class('form-control')
                    ->placeholder(__('backend_gym_classes.validation.attributes.teacher'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_gym_classes.validation.attributes.day_time'))->class('col-md-2 form-control-label')->for('day_time') }}

            <div class="col-md-10">
                {{ html()->select('day_time', $day_time)
                    ->class('form-control')
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_gym_classes.validation.attributes.week_days'))->class('col-md-2 form-control-label')->for('week_days') }}

            <div class="col-md-10">

                @foreach($week_days as $day)
                    <div class="checkbox d-flex align-items-center">
                        {{ html()->label(
                                html()->checkbox('week_days[]', in_array($day, $choosed_week_days), $day)
                                        ->class('switch-input')
                                        ->id('week_days-'.$day)
                                    . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                ->class('switch switch-label switch-pill switch-primary mr-2')
                            ->for('week_days-'.$day) }}
                        {{ html()->label(ucwords($day))->for('week_days-'.$day) }}
                    </div>
                @endforeach
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_gym_classes.validation.attributes.start_at'))->class('col-md-2 form-control-label')->for('start_at') }}

            <div class="col-md-10">
                {{ html()->time('start_at')
                    ->class('form-control')
                    ->placeholder(__('backend_gym_classes.validation.attributes.start_at'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_gym_classes.validation.attributes.finish_at'))->class('col-md-2 form-control-label')->for('finish_at') }}

            <div class="col-md-10">
                {{ html()->time('finish_at')
                    ->class('form-control')
                    ->placeholder(__('backend_gym_classes.validation.attributes.finish_at'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_gym_classes.validation.attributes.room'))->class('col-md-2 form-control-label')->for('room') }}

            <div class="col-md-10">
                {{ html()->text('room')
                    ->class('form-control')
                    ->placeholder(__('backend_gym_classes.validation.attributes.room'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
