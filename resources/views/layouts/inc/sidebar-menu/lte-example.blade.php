@if (!app()->environment('production'))
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">LTE example</li>
    <li><a href="/lte"><i class="fa fa-compass"></i> <span>Home</span></a></li>
    <li><a href="/lte/fields"><i class="fa fa-plus-square"></i> <span>Fields</span></a></li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-file-picture-o"></i>
            <span>Pages</span>
            <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="/lte/pages"><i class="fa fa-circle-o text-yellow"></i> <span>List</span></a></li>
            <li><a href="/lte/pages/create"><i class="fa fa-circle-o text-yellow"></i> <span>Create</span></a></li>
            <li><a href="/lte/pages/edit"><i class="fa fa-circle-o text-yellow"></i> <span>Edit</span></a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Settings</span>
            <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="/lte/settings/vars"><i class="fa fa-circle-o text-yellow"></i> <span>Variables</span></a></li>
            <li><a href="/lte/settings/logs"><i class="fa fa-circle-o text-yellow"></i> <span>Logs</span></a></li>
            <li><a href="/lte/settings/tinker"><i class="fa fa-circle-o text-yellow"></i> <span>Tinker</span></a></li>
            <li><a href="/lte/settings/lte"><i class="fa fa-circle-o text-yellow"></i> <span>LTE</span></a></li>
        </ul>
    </li>

    <li><a href="/lte/users"><i class="fa fa-users"></i> <span>Users</span></a></li>
    <li><a href="/lte/profile"><i class="fa fa-user"></i> <span>Profile</span></a></li>
    <li><a href="/lte/login"><i class="fa fa-sign-in"></i> <span>Login</span></a></li>
    <li><a href="/lte/blank"><i class="fa fa-circle-o text-green"></i> <span>Blank</span></a></li>
</ul>
@endif