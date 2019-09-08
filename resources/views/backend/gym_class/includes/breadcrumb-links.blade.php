<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('backend_gym_classes.menus.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.gym_classes.index') }}">@lang('backend_gym_classes.menus.all')</a>
                <a class="dropdown-item" href="{{ route('admin.gym_classes.create') }}">@lang('backend_gym_classes.menus.create')</a>
                {{-- <a class="dropdown-item" href="{{ route('admin.gym_classes.deactivated') }}">@lang('backed_gym_classes.menus.deactivated')</a> --}}
                <a class="dropdown-item" href="{{ route('admin.gym_classes.deleted') }}">@lang('backend_gym_classes.menus.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
