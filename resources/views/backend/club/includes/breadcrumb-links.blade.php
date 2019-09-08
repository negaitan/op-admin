<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('backend_clubs.menus.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.clubs.index') }}">@lang('backend_clubs.menus.all')</a>
                <a class="dropdown-item" href="{{ route('admin.clubs.create') }}">@lang('backend_clubs.menus.create')</a>
                {{-- <a class="dropdown-item" href="{{ route('admin.clubs.deactivated') }}">@lang('backed_clubs.menus.deactivated')</a> --}}
                <a class="dropdown-item" href="{{ route('admin.clubs.deleted') }}">@lang('backend_clubs.menus.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
