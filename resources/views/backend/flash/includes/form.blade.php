<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.zona'))->class('col-md-2 form-control-label')->for('zona') }}

            <div class="col-md-10">
                {{ html()->text('zona')
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.zona'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.nombrePlan'))->class('col-md-2 form-control-label')->for('name_plan') }}

            <div class="col-md-10">
                {{ html()->text('name_plan')
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.nombrePlan'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.precioFlash'))->class('col-md-2 form-control-label')->for('precio_flash') }}

            <div class="col-md-10">
                {{ html()->text('precio_flash')
                    ->attribute('type', 'number')
                    ->attribute('step', 0.01)
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.precioFlash'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.labelFlash'))->class('col-md-2 form-control-label')->for('label_flash') }}

            <div class="col-md-10">
                {{ html()->text('label_flash')
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.labelFlash'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.precioEspecial'))->class('col-md-2 form-control-label')->for('precio_especial') }}

            <div class="col-md-10">
                {{ html()->text('precio_especial')
                    ->attribute('type', 'number')
                    ->attribute('step', 0.01)
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.precioEspecial'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.labelEspecial'))->class('col-md-2 form-control-label')->for('label_especial') }}

            <div class="col-md-10">
                {{ html()->text('label_especial')
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.labelEspecial'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.precioOnSale'))->class('col-md-2 form-control-label')->for('precio_onSale') }}

            <div class="col-md-10">
                {{ html()->text('precio_onSale')
                    ->attribute('type', 'number')
                    ->attribute('step', 0.01)
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.precioOnSale'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.labelOnSale'))->class('col-md-2 form-control-label')->for('label_onSale') }}

            <div class="col-md-10">
                {{ html()->text('label_onSale')
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.labelOnSale'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.precioRegular'))->class('col-md-2 form-control-label')->for('precio_regular') }}

            <div class="col-md-10">
                {{ html()->text('precio_regular')
                    ->attribute('type', 'number')
                    ->attribute('step', 0.01)
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.precioRegular'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_flashs.validation.attributes.labelRegular'))->class('col-md-2 form-control-label')->for('label_regular') }}

            <div class="col-md-10">
                {{ html()->text('label_regular')
                    ->class('form-control')
                    ->placeholder(__('backend_flashs.validation.attributes.labelRegular'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->


