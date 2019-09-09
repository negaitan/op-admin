<li class="nav-item">
    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/gym_classes*')) }}" href="{{ route('admin.gym_classes.index') }}">
        <i class="nav-icon fas fa-folder"></i> @lang('backend_gym_classes.sidebar.title')
    </a>
</li>