<li class="nav-item">
    <a class="nav-link {{
        active_class(Active::checkUriPattern('admin/clubs')) }}" href="{{ route('admin.clubs.index') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        @lang('backend_clubs.label')
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{
        active_class(Active::checkUriPattern('admin/class_groups')) }}" href="{{ route('admin.class_groups.index') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        @lang('backend_class_groups.label')
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{
        active_class(Active::checkUriPattern('admin/gym_classes')) }}" href="{{ route('admin.gym_classes.index') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        @lang('backend_gym_classes.label')
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{
        active_class(Active::checkUriPattern('admin/settings')) }}" href="{{ route('admin.settings.index') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        @lang('backend_settings.label')
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{
        active_class(Active::checkUriPattern('admin/plans')) }}" href="{{ route('admin.plans.index') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        @lang('backend_plans.label')
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{
        active_class(Active::checkUriPattern('admin/web_texts')) }}" href="{{ route('admin.web_texts.index') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        @lang('backend_web_texts.label')
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{
        active_class(Active::checkUriPattern('admin/images')) }}" href="{{ route('admin.images.index') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        @lang('backend_images.label')
    </a>
</li>
