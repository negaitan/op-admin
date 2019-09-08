<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_clubs.validation.attributes.name'))->class('col-md-2 form-control-label')->for('name') }}

            <div class="col-md-10">
                {{ html()->text('name')
                    ->class('form-control')
                    ->placeholder(__('backend_clubs.validation.attributes.name'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_clubs.validation.attributes.web_text'))->class('col-md-2 form-control-label')->for('web_text_id') }}

            <div class="col-md-10">
                {{ html()->select('web_text_id', $texts->pluck('key','id'))
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
        {{ html()->label(__('backend_clubs.validation.attributes.address'))->class('col-md-2 form-control-label')->for('address') }}

            <div class="col-md-10">
                {{ html()->text('address')
                    ->class('form-control')
                    ->placeholder(__('backend_clubs.validation.attributes.address'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_clubs.validation.attributes.opening_time'))->class('col-md-2 form-control-label')->for('opening_time') }}

            <div class="col-md-10">
                {{ html()->text('opening_time')
                    ->class('form-control')
                    ->placeholder(__('backend_clubs.validation.attributes.opening_time'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_clubs.validation.attributes.latitude'))->class('col-md-2 form-control-label')->for('latitude') }}

            <div class="col-md-10">
                {{ html()->text('latitude')
                    ->class('form-control')
                    ->placeholder(__('backend_clubs.validation.attributes.latitude'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_clubs.validation.attributes.longitude'))->class('col-md-2 form-control-label')->for('longitude') }}

            <div class="col-md-10">
                {{ html()->text('longitude')
                    ->class('form-control')
                    ->placeholder(__('backend_clubs.validation.attributes.longitude'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
