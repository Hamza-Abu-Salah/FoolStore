<div class="sidebar" id="sidebar" style="transform: scaleX(-1)">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu" style="transform: scaleX(-1)">
            <ul>
                <li class="@yield('menu_1')">
                    <a href="/store"> <span>الرئيسية</span><i class="fa-solid fa-house-chimney"></i></a>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                <li class="submenu @yield('menu_2')">
                    <a href=""> <span> أقسام الوجبات</span> <span class="menu-arrow" style="margin-right: 84%;"></span><i
                            class="fa-solid fa-store"></i></a>
                    <ul style="display: none;">
                        <li><a class="@yield('menu_2_item_1')" href="/store/products/categories">كل الاقسام</a></li>
                        <li><a class="@yield('menu_2_item_2')" href="/store/products/categories/create">انشاء</a></li>

                    </ul>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                <li class="submenu @yield('menu_3')">
                    <a href=""> <span> الوجبات</span> <span class="menu-arrow" style="margin-right: 84%;"></span><i
                            class="fa-solid fa-store"></i></a>
                    <ul style="display: none;">
                        <li><a class="@yield('menu_3_item_1')" href="/store/products">كل الوجبات</a></li>
                        <li><a class="@yield('menu_3_item_2')" href="/store/products/create">انشاء</a></li>

                    </ul>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                <li class="@yield('menu_4')">
                    <a href="/store/orders"> <span>الطلبات</span><i class="fa-solid fa-house-chimney"></i></a>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
            </ul>
        </div>
    </div>
</div>
