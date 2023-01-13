@foreach ($main_menu as $menuKey => $menu)
    <li>
        <a href="{{ isset($menu['route_name']) ? route($menu['route_name']) : 'javascript:;' }}"
            class="{{ $first_level_active_index == $menuKey ? 'sub-menu-item' : 'sub-menu-item' }}">
            {{ $menu['title'] }}</a>
        @if (isset($menu['sub_menu']))
            <span class="menu-arrow"></span>
        @endif
        @if (isset($menu['sub_menu']))
            <ul class="{{ $first_level_active_index == $menuKey ? 'submenu' : '' }}">
                @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                    <li>
                        <a href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name']) : 'javascript:;' }}"
                            class="{{ $second_level_active_index == $subMenuKey ? 'sub-menu-item' : 'sub-menu-item' }}">
                            {{ $subMenu['title'] }}
                            @if (isset($subMenu['sub_menu']))
                                <span class="submenu-arrow"></span>
                            @endif
                        </a>
                        @if (isset($subMenu['sub_menu']))
                            <ul class="{{ $second_level_active_index == $subMenuKey ? 'submenu' : '' }}">
                                @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                    <li>
                                        <a href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name']) : 'javascript:;' }}"
                                            class="{{ $third_level_active_index == $lastSubMenuKey ? 'sub-menu-item' : 'sub-menu-item' }}">
                                            {{ $lastSubMenu['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach
