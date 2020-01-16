<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('backend_class_names.menus.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.class_names.index') }}">@lang('backend_class_names.menus.all')</a>
                <a class="dropdown-item" href="{{ route('admin.class_names.create') }}">@lang('backend_class_names.menus.create')</a>
                {{-- <a class="dropdown-item" href="{{ route('admin.class_names.deactivated') }}">@lang('backed_class_names.menus.deactivated')</a> --}}
                <a class="dropdown-item" href="{{ route('admin.class_names.deleted') }}">@lang('backend_class_names.menus.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
