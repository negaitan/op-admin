<li class="nav-item">
    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/plans*')) }}" href="{{ route('admin.plans.index') }}">
        <i class="nav-icon fas fa-folder"></i> @lang('backend_plans.sidebar.title')
    </a>
</li>