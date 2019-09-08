<li class="nav-item">
    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/settings*')) }}" href="{{ route('admin.settings.index') }}">
        <i class="nav-icon icon-folder"></i> @lang('backend_settings.sidebar.title')
    </a>
</li>