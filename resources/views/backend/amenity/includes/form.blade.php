<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_amenities.validation.attributes.key'))->class('col-md-2 form-control-label')->for('key') }}

            <div class="col-md-10">
                {{ html()->text('key')
                    ->class('form-control')
                    ->placeholder(__('backend_amenities.validation.attributes.key'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_amenities.validation.attributes.value'))->class('col-md-2 form-control-label')->for('value') }}

            <div class="col-md-10">
                {{ html()->text('value')
                    ->class('form-control')
                    ->placeholder(__('backend_amenities.validation.attributes.value'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
