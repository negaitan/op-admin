<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('backend_images.menus.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.images.index') }}">@lang('backend_images.menus.all')</a>
                <a class="dropdown-item" href="{{ route('admin.images.create') }}">@lang('backend_images.menus.create')</a>
                {{-- <a class="dropdown-item" href="{{ route('admin.images.deactivated') }}">@lang('backed_images.menus.deactivated')</a> --}}
                <a class="dropdown-item" href="{{ route('admin.images.deleted') }}">@lang('backend_images.menus.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
