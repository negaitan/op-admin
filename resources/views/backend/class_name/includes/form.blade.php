<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_names.validation.attributes.key'))->class('col-md-2 form-control-label')->for('key') }}

            <div class="col-md-10">
                {{ html()->text('key')
                    ->class('form-control')
                    ->placeholder(__('backend_class_names.validation.attributes.key'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_names.validation.attributes.value'))->class('col-md-2 form-control-label')->for('value') }}

            <div class="col-md-10">
                {{ html()->textarea('value')
                    ->class('form-control')
                    ->attribute('rows', 2)
                    ->placeholder(__('backend_class_names.validation.attributes.value'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_class_names.validation.attributes.exposed'))->class('col-md-2 form-control-label')->for('exposed') }}

            <div class="col-md-10">
                <input type="hidden" name="exposed" value="0">
                <label class="switch switch-label switch-pill switch-primary">
                    {{ html()->checkbox('exposed')->class('switch-input') }}
                    <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                </label>
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

