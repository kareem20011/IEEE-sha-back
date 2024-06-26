@php
$user = auth()->user();
@endphp
<div class="topbar transition">
    <div class="bars">
        <button type="button" class="btn transition" id="sidebar-toggle">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="menu">
        <ul>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    @if ($user && $user->hasMedia('images'))
                        <img src="{{ $user->getFirstMediaUrl('images') }}" alt="">
                    @else
                        <div style="font-size: 30px;">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a style="font-size: 14px;" class="dropdown-item" href="#">{{ auth()->user()->name }}</i></a>
                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i class="fa fa-user size-icon-1"></i> <span>My
                            Profile</span></a>
                    <a class="dropdown-item" href="{{ route('admin.settings.edit') }}"><i class="fa fa-cog size-icon-1"></i>
                        <span>Settings</span></a>
                    <hr class="dropdown-divider">
                    <form method="POST" action="{{ route('logout') }}" id="signOut">
                        @csrf
                        <a class="dropdown-item" href="#" onclick="document.getElementById('signOut').submit()"><i class="fa fa-sign-out-alt  size-icon-1"></i> <span>Sign out</span></a>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</div>
