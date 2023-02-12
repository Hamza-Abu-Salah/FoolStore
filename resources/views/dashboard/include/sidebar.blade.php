@php
    $url = auth('admin')->user()->url?? '';
@endphp
<div class="sidebar" id="sidebar" style="transform: scaleX(-1)">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu" style="transform: scaleX(-1)">
            <ul>
                <li class="@yield('menu_1')">
                    <a href="/panel"> <span>الرئيسية</span><i class="fa-solid fa-house-chimney"></i></a>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                @if($url == '' or $url->admins == "on")
                    <li class="@yield('menu_2')">
                        <a href="/admins"> <span>المشرفين</span> <i class="fa-solid fa-user-group"></i></a>
                    </li>
                    <hr style="margin: 0; background: #A3A3A3;">
                @endif
                @if($url == '' or $url->users == "on")
                    <li class="@yield('menu_3')">
                        <a href="/users"> <span>المستخدمين</span><i class="fa-solid fa-user-group"></i></a>
                    </li>
                    <hr style="margin: 0; background: #A3A3A3;">
                @endif
                @if($url == '' or $url->leaders == "on")
                    <li class="submenu">
                        <a href="/leaders"> <span> الكابتن </span> <span class="menu-arrow"
                                                                         style="margin-right: 84%;"></span><i
                                class="fa-solid fa-taxi"></i></a>
                        <ul style="display: none;">
                            <li><a class="@yield('menu_4_item_1')" href="/leaders">كل
                                    الكباتن</a></li>
                            <li><a class="@yield('menu_4_item_2')"
                                   href="/leaders/registers">طلبات التسجيل </a></li>
                            <li><a class="@yield('menu_4_item_3')"
                                   href="/leaders/identity-docs">توثيق الهوية </a></li>
                        </ul>
                    </li>
                    <hr style="margin: 0; background: #A3A3A3;">
                @endif
                @if($url == '' or $url->sliders == "on")
                    <li class="@yield('menu_5')">
                        <a href="/sliders"> <span>السلايدر</span><i class="fa-solid fa-image"></i></a>
                    </li>
                    <hr style="margin: 0; background: #A3A3A3;">
                @endif
                @if($url == '' or $url->categories == "on")
                    <li class="@yield('menu_6')">
                        <a href="/categories"> <span>الاقسام</span> <i class="fa-solid fa-list-ul"></i></a>
                    </li>
                    <hr style="margin: 0; background: #A3A3A3;">
                @endif
                <li class="@yield('menu_8')">
                    <a href="/cards"> <span>كروت الشحن</span><i class="fa-solid fa-credit-card"></i></a>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                @if($url == '' or $url->stores == "on")
                    <li class="submenu @yield('menu_9')">
                        <a href=""> <span> المتاجر</span> <span class="menu-arrow" style="margin-right: 84%;"></span><i
                                class="fa-solid fa-store"></i></a>
                        <ul style="display: none;">
                            <li><a class="@yield('menu_9_item_1')" href="/stores">كل المتاجر</a></li>
                            <li><a class="@yield('menu_9_item_2')" href="/stores/registers">طلبات التسجيل</a></li>

                        </ul>
                    </li>
                    <hr style="margin: 0; background: #A3A3A3;">
                @endif
                <li class="submenu @yield('menu_10')">
                    <a href=""> <span> المنتجات</span> <span class="menu-arrow" style="margin-right: 84%;"></span><i
                            class="fa-solid fa-spoon"></i></a>
                    <ul style="display: none;">
                        <li><a class="@yield('menu_10_item_1')" href="/products">كل المنتجات</a></li>
                        <li><a class="@yield('menu_10_item_2')" href="/products/accepted">منتجات مقبولة</a></li>
                        <li><a class="@yield('menu_10_item_3')" href="/products/waiting">منتجات في انتظار المراجعة</a></li>

                    </ul>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                @if($url == '' or $url->coupons == "on")
                    <li class="@yield('menu_11')">
                        <a href="/coupons"> <span>كوبونات الخصم</span><i class="fa-solid fa-gift"></i></a>
                    </li>
                    <hr style="margin: 0; background: #A3A3A3;">
                @endif
                <li class="submenu @yield('menu_rates')">
                    <a href=""> <span> التقييمات</span> <span class="menu-arrow" style="margin-right: 84%;"></span><i
                            class="fa-solid fa-star"></i></a>
                    <ul style="display: none;">
                        <li><a class="@yield('menu_rates_item_1')" href="/rates/stores">تقييمات متاجر</a></li>
                        <li><a class="@yield('menu_rates_item_2')" href="/rates/captains">تقييمات كباتن</a></li>
                        <li><a class="@yield('menu_rates_item_3')" href="/rates/users">تقييمات مستخدمين</a></li>

                    </ul>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                <li class="submenu @yield('menu_complaints')">
                    <a href=""> <span> الشكاوي</span> <span class="menu-arrow" style="margin-right: 84%;"></span><i
                            class="fa-solid fa-page4"></i></a>
                    <ul style="display: none;">
                        <li><a class="@yield('menu_complaints_item_1')" href="/complaints/stores">شكاوي على متاجر</a></li>
                        <li><a class="@yield('menu_complaints_item_2')" href="/complaints/captains">شكاوي على كباتن</a></li>
                        <li><a class="@yield('menu_complaints_item_3')" href="/complaints/users">شكاوي على مستخدمين</a></li>

                    </ul>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                <li class="@yield('menu_12')">
                    <a href="/banks"> <span>البنوك</span><i class="fa-solid fa-building-columns"></i></a>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                <li class="@yield('menu_13')">
                    <a href="/nationalities"> <span>الجنسيات</span><i class="fa-solid fa-flag"></i></a>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                <li class="submenu @yield('menu_19')">
                    <a href=""> <span> آراء العملاء</span> <span class="menu-arrow" style="margin-right: 84%;"></span><i
                            class="fa-solid fa-store"></i></a>
                    <ul style="display: none;">
                        <li><a class="@yield('menu_19_item_1')" href="/customers/reviews">كل الآراء</a></li>
                        <li><a class="@yield('menu_19_item_2')" href="/customers/reviews/create">انشاء</a></li>

                    </ul>
                </li>
                <hr style="margin: 0; background: #A3A3A3;">
                @if($url == '' or $url->orders == "on")
                    <li class="@yield('menu_15')">
                        <a href="/orders"> <span>الطلبات</span><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <hr style="margin: 0; background: #A3A3A3;">
                @endif
                @if($url == '' or $url->call_us == "on")
                    <li class="@yield('menu_16')">
                        <a href="/call-us"> <span> إتصل بنا</span><i class="fa-solid fa-envelope"></i></a>
                    </li>
                    <hr style="margin: 0; background: #A3A3A3;">
                @endif
                <hr style="margin: 0; background: #A3A3A3;">
                @if($url == '' or $url->settings == "on")
                    <li class="@yield('menu_18')">
                        <a href="/settings"> <span>الاعدادات</span><i class="fa-solid fa-gear"></i></a>
                    </li>
            @endif
            <!-- <i class="fa-solid fa-headset"></i> -->
            </ul>
        </div>
    </div>
</div>
