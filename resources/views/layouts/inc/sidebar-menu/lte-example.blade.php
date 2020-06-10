@if (!app()->environment('production'))
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">LTE example</li>
    <li><a href="/lte"><i class="fa fa-circle-o text-green"></i> <span>Главная</span></a></li>
    <li><a href="/lte/fields"><i class="fa fa-circle-o text-red"></i> <span>Поля</span></a></li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-circle-o text-aqua"></i>
            <span>Страницы</span>
            <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="/lte/pages"><i class="fa fa-circle-o text-yellow"></i> <span>Все страницы</span></a></li>
            <li><a href="/lte/pages/create"><i class="fa fa-circle-o text-yellow"></i> <span>Создать страницу</span></a></li>
            <li><a href="/lte/pages/edit"><i class="fa fa-circle-o text-yellow"></i> <span>Редактировать страницу</span></a></li>
        </ul>
    </li>

    <li><a href="/lte/users"><i class="fa fa-circle-o text-blue"></i> <span>Пользователи</span></a></li>
    <li><a href="/lte/account"><i class="fa fa-circle-o text-danger"></i> <span>Аккаунт</span></a></li>
    <li><a href="/lte/login"><i class="fa fa-circle-o text-danger"></i> <span>Вход</span></a></li>
    <li><a href="/lte/blank"><i class="fa fa-circle-o text-gray"></i> <span>Чистый</span></a></li>
</ul>
@endif