<li class="{{ ! starts_with(Route::currentRouteName(), 'admin.activity') ?: 'active' }}">
    <a href="{{ route('admin.activity') }}">
        <i class="fa fa-list"></i> <span>Activity Logs</span>
    </a>
</li>
