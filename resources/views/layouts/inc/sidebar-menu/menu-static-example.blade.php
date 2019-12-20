<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Меню</li>
    <li class="active">
        <a href="#/admin">
            <i class="fa fa-dashboard"></i>
            <span>Главная</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-file-text-o"></i>
            <span>Материалы</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#/admin/products"><i class="fa fa-circle-o text-green"></i> Товары</a></li>
            <li><a href="#/admin/sales"><i class="fa fa-circle-o text-green"></i> Акции</a></li>
            <li><a href="#/admin/pages"><i class="fa fa-circle-o text-green"></i> Страницы</a></li>
            <li><a href="#/admin/articles"><i class="fa fa-circle-o text-green"></i> Статьи</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-th"></i>
            <span>Структура</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o text-green"></i>
                    <span>Рубрикатор</span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#/admin/terms?vocabulary=product_categories"><i class="fa fa-circle-o text-green"></i> Категории товаров</a></li>
                    <li><a href="#/admin/terms?vocabulary=article_categories"><i class="fa fa-circle-o text-green"></i> Категории статей</a></li>
                    <li><a href="#/admin/terms?vocabulary=faq_subjects"><i class="fa fa-circle-o text-green"></i> Темы FAQ</a></li>
                </ul>
            </li>
            <li><a href="#/admin/shop/attributes"><i class="fa fa-circle-o text-green"></i> Атрибуты</a></li>
            <li><a href="#/admin/menu"><i class="fa fa-circle-o text-green"></i> Меню</a></li>
        </ul>
    </li>

    <li class="treeview ">
        <a href="#">
            <i class=" fa fa-rocket "></i>
            <span>SEO</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#/admin/meta-tags/"><i class="fa fa-circle-o text-green "></i><span>Мета-теги путей</span></a></li>
            <li><a href="#/admin/site-map/"><i class="fa fa-circle-o text-green "></i><span>Карта сайта</span></a></li>
        </ul>
    </li>

    <li class="treeview ">
        <a href="#/admin/variables/common/forms/">
            <i class=" fa fa-cogs "></i>
            <span>Конфигурации</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-chrome"></i>
            <span>Веб-формы</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#/admin/forms/subscribers"><i class="fa fa-circle-o text-green"></i> Подписчики</a></li>
            <li><a href="#/admin/forms/contacts"><i class="fa fa-circle-o text-green"></i> Контакты</a></li>
            <li><a href="#/admin/product-reviews"><i class="fa fa-circle-o text-green"></i> Отзывы о товарах</a></li>
        </ul>
    </li>

    <li>
        <a href="#/admin/orders">
            <i class="fa fa-shopping-cart"></i> <span>Заказы</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"> 254</span>
            </span>
        </a>
    </li>

    <li>
        <a href="#/admin/users">
            <i class="fa fa-users"></i> <span>Пользователи</span>
            <span class="pull-right-container">
              <span class="label label-warning pull-right"> 43</span>
            </span>
        </a>
    </li>

    @if (!app()->environment('production'))
    <li class="header">LTE примеры</li>
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
            <li><a href="/lte/pages"><i class="fa fa-circle-o text-yellow"></i> <span>Все страницу</span></a></li>
            <li><a href="/lte/pages/create"><i class="fa fa-circle-o text-yellow"></i> <span>Создать страницу</span></a></li>
            <li><a href="/lte/pages/edit"><i class="fa fa-circle-o text-yellow"></i> <span>Редактировать страницу</span></a></li>
        </ul>
    </li>

    <li><a href="/lte/users"><i class="fa fa-circle-o text-blue"></i> <span>Пользователи</span></a></li>
    <li><a href="/lte/account"><i class="fa fa-circle-o text-danger"></i> <span>Аккаунт</span></a></li>
    <li><a href="/lte/login"><i class="fa fa-circle-o text-danger"></i> <span>Вход</span></a></li>
    <li><a href="/lte/blank"><i class="fa fa-circle-o text-gray"></i> <span>Чистый</span></a></li>
    @endif
</ul>