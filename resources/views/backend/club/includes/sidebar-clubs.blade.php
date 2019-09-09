<li class="nav-item">
    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/clubs*')) }}" href="{{ route('admin.clubs.index') }}">
        <i class="nav-icon fas fa-folder"></i> @lang('backend_clubs.sidebar.title')
    </a>
</li>