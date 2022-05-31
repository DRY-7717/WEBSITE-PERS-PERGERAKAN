<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">Pers Pergerakan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">PP</a>
        </div>
        <ul class="sidebar-menu">
            @can('admin')
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                        class="fas fa-columns"></i> <span>Dashboard</span></a>
            </li>
            @endcan

            <li class="menu-header">User</li>
            <li class="{{ Request::is('dashboard/user') ? 'active' : '' }}"><a class="nav-link"
                    href="/dashboard/user"><i class="fas fa-user"></i> <span>My profile</span></a>
            </li>
            <li class="{{ Request::is('dashboard/user/changepassword*') ? 'active' : '' }}"><a class="nav-link"
                    href="/dashboard/user/changepassword"><i class="fas fa-key"></i>
                    <span>Change password</span></a>
            </li>

            <li class="menu-header">Posts</li>
            <li class="{{ Request::is('dashboard/post*') ? 'active' : '' }}"><a class="nav-link"
                    href="/dashboard/post"><i class="fas fa-newspaper"></i> <span>My post</span></a>
            </li>
            @can('admin')
            <li class="{{ Request::is('dashboardeditor/post*') ? 'active' : '' }}"><a class="nav-link"
                    href="/dashboardeditor/post"><i class="fas fa-check-circle"></i> <span>Editor choice</span></a>
            </li>
            <li class="{{ Request::is('dashboard/iklan*') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/iklan"><i
                        class="fas fa-ad"></i> <span>Ads</span></a>
            </li>
            @endcan



        </ul>

    </aside>
</div>