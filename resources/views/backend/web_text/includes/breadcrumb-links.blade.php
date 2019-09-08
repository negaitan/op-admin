<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('backend_web_texts.menus.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.web_texts.index') }}">@lang('backend_web_texts.menus.all')</a>
                <a class="dropdown-item" href="{{ route('admin.web_texts.create') }}">@lang('backend_web_texts.menus.create')</a>
                {{-- <a class="dropdown-item" href="{{ route('admin.web_texts.deactivated') }}">@lang('backed_web_texts.menus.deactivated')</a> --}}
                <a class="dropdown-item" href="{{ route('admin.web_texts.deleted') }}">@lang('backend_web_texts.menus.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
