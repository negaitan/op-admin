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
            <div class="col-md-2 form-control-label">
                <div>
                    <input type="radio" name="image_type" value="url" {{ isset($image) ? ($image->image_type == 'url' ? 'checked' : '') : 'checked' }} /> {{ __('Url Image') }}
                    <br>
                    <input type="radio" name="image_type" value="storage" {{ isset($image) ? ($image->image_type == 'storage' ? 'checked' : '') : '' }} /> {{ __('File Upload') }}
                </div>
            </div>

            <div class="col-md-10">
                <div class="form-group hidden" id="url_image">
                    {{ html()->text('url')
                        ->id('url_image_input')
                        ->class('form-control')
                        ->placeholder(__('backend_images.validation.attributes.url'))
                        ->attribute('maxlength', 191) }}
                </div><!--form-group-->

                <div class="form-group hidden" id="image">
                    {{ html()->file('image')->id('image_input')->class('form-control') }}
                </div><!--form-group-->
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

@push('after-scripts')
    <script>
        $(function() {
            var image = $("#image");
            var url_image = $("#url_image");

            if ($('input[name=image_type]:checked').val() === 'storage') {
                image.show();
                url_image.hide();
            } else {
                image.hide();
                url_image.show();
            }

            $('input[name=image_type]').change(function() {
                if ($(this).val() === 'storage') {
                    image.show();
                    url_image.hide();
                    $("#image_input").val(null);
                } else {
                    image.hide();
                    $("#url_image_input").val(null);
                    url_image.show();
                }
            });
        });
    </script>
@endpush
