@if (!app()->environment('production'))
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">LTE example</li>
    <li><a href="/lte"><i class="fa fa-circle-o text-green"></i> <span>Home</span></a></li>
    <li><a href="/lte/fields"><i class="fa fa-circle-o text-red"></i> <span>Fields</span></a></li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-circle-o text-aqua"></i>
            <span>Pages</span>
            <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="/lte/pages"><i class="fa fa-circle-o text-yellow"></i> <span>Page list</span></a></li>
            <li><a href="/lte/pages/create"><i class="fa fa-circle-o text-yellow"></i> <span>Create page</span></a></li>
            <li><a href="/lte/pages/edit"><i class="fa fa-circle-o text-yellow"></i> <span>Edit page</span></a></li>
        </ul>
    </li>

    <li><a href="/lte/users"><i class="fa fa-circle-o text-blue"></i> <span>Users</span></a></li>
    <li><a href="/lte/profile"><i class="fa fa-circle-o text-danger"></i> <span>Profile</span></a></li>
    <li><a href="/lte/login"><i class="fa fa-circle-o text-danger"></i> <span>Login</span></a></li>
    <li><a href="/lte/blank"><i class="fa fa-circle-o text-gray"></i> <span>Blank</span></a></li>
</ul>
@endif