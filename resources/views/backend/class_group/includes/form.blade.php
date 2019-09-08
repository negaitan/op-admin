<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_groups.validation.attributes.name'))->class('col-md-2 form-control-label')->for('name') }}

            <div class="col-md-10">
                {{ html()->text('name')
                    ->class('form-control')
                    ->placeholder(__('backend_class_groups.validation.attributes.name'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_groups.validation.attributes.logo_image'))->class('col-md-2 form-control-label')->for('logo_image_id') }}

            <div class="col-md-10">
                {{ html()->select('logo_image_id', $images->pluck('internal_key','id'))
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
        {{ html()->label(__('backend_class_groups.validation.attributes.description'))->class('col-md-2 form-control-label')->for('description') }}

            <div class="col-md-10">
                {{ html()->textarea('description')
                    ->class('form-control')
                    ->placeholder(__('backend_class_groups.validation.attributes.description'))
                    ->attribute('rows', 3)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_groups.validation.attributes.cover_image'))->class('col-md-2 form-control-label')->for('cover_image_id') }}

            <div class="col-md-10">
                {{ html()->select('cover_image_id', $images->pluck('internal_key','id'))
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
        {{ html()->label(__('backend_class_groups.validation.attributes.video_url'))->class('col-md-2 form-control-label')->for('video_url') }}

            <div class="col-md-10">
                {{ html()->text('video_url')
                    ->class('form-control')
                    ->placeholder(__('backend_class_groups.validation.attributes.video_url'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_groups.validation.attributes.classes'))->class('col-md-2 form-control-label')->for('classes') }}

            <div class="col-md-10">
                {{ html()->text('classes')
                    ->class('form-control')
                    ->placeholder(__('backend_class_groups.validation.attributes.classes'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_groups.validation.attributes.teacher_image'))->class('col-md-2 form-control-label')->for('teacher_image_id') }}

            <div class="col-md-10">
                {{ html()->select('teacher_image_id', $images->pluck('internal_key','id'))
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
        {{ html()->label(__('backend_class_groups.validation.attributes.teacher_name'))->class('col-md-2 form-control-label')->for('teacher_name') }}

            <div class="col-md-10">
                {{ html()->text('teacher_name')
                    ->class('form-control')
                    ->placeholder(__('backend_class_groups.validation.attributes.teacher_name'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_groups.validation.attributes.teacher_title'))->class('col-md-2 form-control-label')->for('teacher_title') }}

            <div class="col-md-10">
                {{ html()->text('teacher_title')
                    ->class('form-control')
                    ->placeholder(__('backend_class_groups.validation.attributes.teacher_title'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_groups.validation.attributes.teacher_text'))->class('col-md-2 form-control-label')->for('teacher_text') }}

            <div class="col-md-10">
                {{ html()->textarea('teacher_text')
                    ->class('form-control')
                    ->placeholder(__('backend_class_groups.validation.attributes.teacher_text'))
                    ->attribute('rows', 3)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_groups.validation.attributes.playlist_url'))->class('col-md-2 form-control-label')->for('playlist_url') }}

            <div class="col-md-10">
                {{ html()->text('playlist_url')
                    ->class('form-control')
                    ->placeholder(__('backend_class_groups.validation.attributes.playlist_url'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
