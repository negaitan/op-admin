<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_images.validation.attributes.internal_key'))->class('col-md-2 form-control-label')->for('internal_key') }}

            <div class="col-md-10">
                {{ html()->text('internal_key')
                    ->class('form-control')
                    ->placeholder(__('backend_images.validation.attributes.internal_key'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_images.validation.attributes.url'))->class('col-md-2 form-control-label')->for('url') }}

            <div class="col-md-10">
                {{ html()->text('url')
                    ->class('form-control')
                    ->placeholder(__('backend_images.validation.attributes.url'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_images.validation.attributes.alt'))->class('col-md-2 form-control-label')->for('alt') }}

            <div class="col-md-10">
                {{ html()->text('alt')
                    ->class('form-control')
                    ->placeholder(__('backend_images.validation.attributes.alt'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
