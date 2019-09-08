<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('backend_settings.menus.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.settings.index') }}">@lang('backend_settings.menus.all')</a>
                <a class="dropdown-item" href="{{ route('admin.settings.create') }}">@lang('backend_settings.menus.create')</a>
                {{-- <a class="dropdown-item" href="{{ route('admin.settings.deactivated') }}">@lang('backed_settings.menus.deactivated')</a> --}}
                <a class="dropdown-item" href="{{ route('admin.settings.deleted') }}">@lang('backend_settings.menus.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
