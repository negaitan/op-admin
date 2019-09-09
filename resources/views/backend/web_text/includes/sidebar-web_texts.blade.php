<li class="nav-item">
    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/web_texts*')) }}" href="{{ route('admin.web_texts.index') }}">
        <i class="nav-icon fas fa-folder"></i> @lang('backend_web_texts.sidebar.title')
    </a>
</li>