<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_plans.validation.attributes.name'))->class('col-md-2 form-control-label')->for('name') }}

            <div class="col-md-10">
                {{ html()->text('name')
                    ->class('form-control')
                    ->placeholder(__('backend_plans.validation.attributes.name'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_plans.validation.attributes.description'))->class('col-md-2 form-control-label')->for('description') }}

            <div class="col-md-10">
                {{ html()->text('description')
                    ->class('form-control')
                    ->placeholder(__('backend_plans.validation.attributes.description'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_plans.validation.attributes.price_month'))->class('col-md-2 form-control-label')->for('price_month') }}

            <div class="col-md-10">
                {{ html()->text('price_month')
                    ->attribute('type', 'number')
                    ->attribute('step', 0.01)
                    ->class('form-control')
                    ->placeholder(__('backend_plans.validation.attributes.price_month'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_plans.validation.attributes.price_matriculation'))->class('col-md-2 form-control-label')->for('price_matriculation') }}

            <div class="col-md-10">
                {{ html()->text('price_matriculation')
                    ->attribute('type', 'number')
                    ->attribute('step', 0.01)
                    ->class('form-control')
                    ->placeholder(__('backend_plans.validation.attributes.price_matriculation'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
