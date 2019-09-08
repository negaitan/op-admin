<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('backend_plans.menus.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.plans.index') }}">@lang('backend_plans.menus.all')</a>
                <a class="dropdown-item" href="{{ route('admin.plans.create') }}">@lang('backend_plans.menus.create')</a>
                {{-- <a class="dropdown-item" href="{{ route('admin.plans.deactivated') }}">@lang('backed_plans.menus.deactivated')</a> --}}
                <a class="dropdown-item" href="{{ route('admin.plans.deleted') }}">@lang('backend_plans.menus.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
