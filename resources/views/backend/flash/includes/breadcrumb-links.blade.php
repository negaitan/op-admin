<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('backend_flashs.menus.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.flashs.index') }}">@lang('backend_flashs.menus.all')</a>
                <a class="dropdown-item" href="{{ route('admin.flashs.create') }}">@lang('backend_flashs.menus.create')</a>
                {{-- <a class="dropdown-item" href="{{ route('admin.flashs.deactivated') }}">@lang('backed_flashs.menus.deactivated')</a> --}}
                <a class="dropdown-item" href="{{ route('admin.flashs.deleted') }}">@lang('backend_flashs.menus.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
