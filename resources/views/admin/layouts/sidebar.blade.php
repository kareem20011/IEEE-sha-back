<div class="sidebar transition overlay-scrollbars animate__animated  animate__slideInLeft">
    <div class="sidebar-content">
        <div id="sidebar">

            <!-- Logo -->
            <div class="logo">
                <h2 class="mb-0"><img src="{{ asset( 'temp/images/logo.png' ) }}"> Atrana</h2>
            </div>

            <ul class="side-menu">
                <li>
                    <a href="{{ route( 'admin.dashboard' ) }}" class="{{ request()->is('admin/dashboard/*') || request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class='bx bxs-dashboard icon'></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="#" class="{{ request()->is('admin/events/*') || request()->is('admin/events') ? 'active' : '' }}">
                        <i class='bx bx-calendar-event icon'></i>
                        Events
                        <i class='bx bx-chevron-right icon-right'></i>
                        
                    </a>
                    <ul class="side-dropdown">
                        <li><a class="{{ request()->is('admin/events/create') ? 'active' : '' }}" href="{{ route( 'admin.events.create' ) }}">Add event</a></li>
                        <li><a href="{{ route( 'admin.events.index' ) }}" class="{{ request()->is('admin/events') ? 'active' : '' }}">Show all</a></li>
                    </ul>
                </li>

                <!-- Pages-->

                <li>
                    <a href="#" class="{{ request()->is('admin/users/*') || request()->is('admin/users') ? 'active' : '' }}">
                        <i class='bx bxs-user icon'></i>
                        Users
                        <i class='bx bx-chevron-right icon-right'></i>
                    </a>
                    <ul class="side-dropdown">
                        <li><a class="{{ request()->is('admin/users/create') ? 'active' : '' }}" href="{{ route( 'admin.users.create' ) }}">Add user/admin</a></li>
                        <li><a href="{{ route( 'admin.users.index' ) }}" class="{{ request()->is('admin/users') ? 'active' : '' }}">Show all</a></li>
                    </ul>
                </li>

                <li>
                    <a href="blank-pages.html">
                        <i class='bx bxs-meh-blank icon'></i>
                        Blank Page
                    </a>
                </li>

            </ul>


        </div>

    </div>
</div>