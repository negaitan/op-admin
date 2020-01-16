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

<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_clubs.validation.attributes.plans'))->class('col-md-2 form-control-label')->for('plans') }}

            <div class="col-md-10">
                @if (!isset($club))
                    {{ html()->select('plans',$plans->pluck('name','id'))
                        ->class('form-control')
                        ->multiple()
                        ->required() }}
                @else
                    <select class="form-control" name="plans[]" id="plans" multiple="" required="">
                        @foreach ($plans->pluck('name','id') as $key => $item)
                            <option value="{{ $key }}" {{ $club->plans->pluck('name')->contains($item) ? ' selected="true"' : '' }}>{{$item}}</option>
                        @endforeach
                    </select>
                @endif
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_clubs.validation.attributes.amenities'))->class('col-md-2 form-control-label')->for('amenities') }}

            <div class="col-md-10">
                {{ html()->text('amenities')
                    ->class('form-control')
                    ->placeholder(__('backend_clubs.validation.attributes.amenities'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->



<div class="row mt-1 mb-1">
    <div class="col">
        <div class="form-group row">
        {{ html()->label(__('backend_clubs.validation.attributes.images'))->class('col-md-2 form-control-label')->for('images') }}

            <div class="col-md-10">
                @if (!isset($club))
                    {{ html()->select('images',$images->pluck('internal_key','id'))
                        ->class('form-control')
                        ->multiple()
                        ->required() }}
                @else
                    <select class="form-control" name="images[]" id="images" multiple="" required="">
                        @foreach ($images->pluck('internal_key','id') as $key => $item)
                            <option value="{{ $key }}" {{ $club->images->pluck('internal_key')->contains($item) ? ' selected="true"' : '' }}>{{$item}}</option>
                        @endforeach
                    </select>
                @endif
            </div><!--col-->
        </div><!--form-group-->
    </div><!--col-->
</div><!--row-->
