<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Меню</li>
    <li class="@if(\Illuminate\Support\Facades\Route::is('*.home')) active @endif">
        <a href="#/admin">
            <i class="fa fa-dashboard"></i>
            <span>Главная</span>
        </a>
    </li>
    <li class="@if(\Illuminate\Support\Facades\Route::is('*.users.*')) active @endif">
        <a href="#/admin/users">
            <i class="fa fa-users"></i> <span>Пользователи</span>
            <span class="pull-right-container">
              <span class="label label-warning pull-right"> 43</span>
            </span>
        </a>
    </li>
    <li class="@if(\Illuminate\Support\Facades\Route::is('*.profile.*')) active @endif">
        <a href="/admin/profile">
            <i class="fa fa-user"></i> <span>Профиль</span>
        </a>
    </li>
</ul>