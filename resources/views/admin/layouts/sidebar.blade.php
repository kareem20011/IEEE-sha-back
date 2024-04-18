<div class="sidebar transition overlay-scrollbars animate__animated  animate__slideInLeft">
    <div class="sidebar-content">
        <div id="sidebar">

            <!-- Logo -->
            <div class="logo">
                <h2 class="mb-0">{{ config("app.name") }}</h2>
            </div>

            <ul class="side-menu">
                <li>
                    <a href="{{ route( 'admin.dashboard' ) }}" class="{{ request()->is('admin/dashboard/*') || request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class='bx bxs-dashboard icon'></i> Dashboard
                    </a>
                </li>

                <!-- Pages-->


                <li>
                    <a href="#" class="{{ request()->is('admin/categories/*') || request()->is('admin/categories') ? 'active' : '' }}">
                        <i class='bx bx-category icon'></i>
                        Categories
                        <i class='bx bx-chevron-right icon-right'></i>
                        
                    </a>
                    <ul class="side-dropdown">
                        <li><a class="{{ request()->is('admin/categories/create') ? 'active' : '' }}" href="{{ route( 'admin.categories.create' ) }}">Add category</a></li>
                        <li><a href="{{ route( 'admin.categories.index' ) }}" class="{{ request()->is('admin/categories') ? 'active' : '' }}">Show all</a></li>
                    </ul>
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

                <li>
                    <a href="#" class="{{ request()->is('admin/workshops/*') || request()->is('admin/workshops') ? 'active' : '' }}">
                        <i class='bx bxs-briefcase icon'></i>
                        Workshops
                        <i class='bx bx-chevron-right icon-right'></i>
                    </a>
                    <ul class="side-dropdown">
                        <li><a class="{{ request()->is('admin/workshops/create') ? 'active' : '' }}" href="{{ route( 'admin.workshops.create' ) }}">Add user/admin</a></li>
                        <li><a href="{{ route( 'admin.workshops.index' ) }}" class="{{ request()->is('admin/workshops') ? 'active' : '' }}">Show all</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="{{ request()->is('admin/boards/*') || request()->is('admin/boards') ? 'active' : '' }}">
                        <!-- <i class='bx bxs-user icon'></i> -->
                        <i class="fa-solid fa-users  me-4 ms-3"></i>
                        Boards
                        <i class='bx bx-chevron-right icon-right'></i>
                    </a>
                    <ul class="side-dropdown">
                        <li><a class="{{ request()->is('admin/boards/create') ? 'active' : '' }}" href="{{ route( 'admin.boards.create' ) }}">Add user/admin</a></li>
                        <li><a href="{{ route( 'admin.boards.index' ) }}" class="{{ request()->is('admin/boards') ? 'active' : '' }}">Show all</a></li>
                    </ul>
                </li>

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
                    <a href="{{ route( 'admin.about.edit' ) }}" class="{{ request()->is('admin/about') ? 'active' : '' }}">
                        <i class='bx bxs-meh-blank icon'></i>
                        About Us
                    </a>
                </li>

                <li>
                    <a href="/">
                    <box-icon type='solid' name='objects-horizontal-center'></box-icon>
                        <i class="fa-solid fa-globe me-4 ms-3"></i>
                        Website
                    </a>
                </li>


            </ul>


        </div>

    </div>
</div>