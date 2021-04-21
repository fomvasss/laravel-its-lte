<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menu</li>
    <li class="@if(\Illuminate\Support\Facades\Route::is('*.home')) active @endif">
        <a href="#/control">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="@if(\Illuminate\Support\Facades\Route::is('*.users.*')) active @endif">
        <a href="#/control/users">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <span class="label label-warning pull-right"> 43</span>
            </span>
        </a>
    </li>
    <li class="@if(\Illuminate\Support\Facades\Route::is('*.profile.*')) active @endif">
        <a href="/control/profile">
            <i class="fa fa-user"></i> <span>Profile</span>
        </a>
    </li>
</ul>