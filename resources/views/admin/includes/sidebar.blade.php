<div class="col-12 col-lg-3 col-navbar d-none d-xl-block">
    <aside class="sidebar">
        <a href="#" class="sidebar-logo">
            <div class="d-flex justify-content-start align-items-center">
                <img class="dashboard-logo" src="{{ asset('backend/assets/img/global/logo.svg') }}" alt="" />
                <span>Admin Panel</span>
            </div>

            <button id="toggle-navbar" onclick="toggleNavbar()">
                <img src="{{ asset('backend/assets/img/global/navbar-times.svg') }}" alt="" />
            </button>
        </a>

        <h5 class="sidebar-title">Daily Use</h5>

        <a href="{{ route('admin.dashboard') }}" class="sidebar-item {{ (request()->is('admin/dashboards*')) ? 'active' : '' }}">
            <img src="{{ asset('backend/assets/img/global/grid.svg') }}" width="18" height="18" alt="icon" class="me-3" />
            <span>Overview</span>
        </a>

        <h5 class="sidebar-title">Others</h5>
        
        <a href="{{ route('admin.student.index') }}" class="sidebar-item {{ (request()->is('admin/students*')) ? 'active' : '' }}">
            <img src="{{ asset('backend/assets/img/global/people-fill.svg') }}" width="18" height="18" alt="icon" class="me-3" />
            <span>Students</span>
        </a>

        <a href="{{ route('admin.teacher.index') }}" class="sidebar-item {{ (request()->is('admin/teachers*')) ? 'active' : '' }}">
            <img src="{{ asset('backend/assets/img/global/people.svg') }}" width="18" height="18" alt="icon" class="me-3" />
            <span>Teachers</span>
        </a>

        <a href="{{ route('admin.major.index') }}" class="sidebar-item {{ (request()->is('admin/majors*')) ? 'active' : '' }}">
            <img src="{{ asset('backend/assets/img/global/person-fill-gear.svg') }}" width="18" height="18" alt="icon" class="me-3" />
            <span>Majors</span>
        </a>

        <a href="{{ route('admin.category.index') }}" class="sidebar-item {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
            <img src="{{ asset('backend/assets/img/global/list-check.svg') }}" width="18" height="18" alt="icon" class="me-3" />
            <span>Categories</span>
        </a>


        <a href="{{ route('admin.article.index') }}" class="sidebar-item {{ (request()->is('admin/articles*')) ? 'active' : '' }}">
            <img src="{{ asset('backend/assets/img/global/journals.svg') }}" width="18" height="18" alt="icon" class="me-3" />
            <span>Articles</span>
        </a>

        
        <a href="#" class="sidebar-item {{ (request()->is('admin/change-passwords*')) ? 'active' : '' }}">
            <img src="{{ asset('backend/assets/img/global/lock.svg') }}" width="18" height="18" alt="icon" class="me-3" />
            <span>Change Password</span>
        </a>

        <a href="{{ route('admin.logout') }}" class="sidebar-item">
            <img src="{{ asset('backend/assets/img/global/log-out.svg') }}" width="18" height="18" alt="icon" class="me-3" />
            <span>Logout</span>
        </a>
    </aside>
</div>