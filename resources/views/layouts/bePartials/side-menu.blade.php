<nav class="side-nav">
    <x-logo class="items-center pl-5 pt-4">
        <span class="ml-3 hidden text-lg text-white xl:block">
            {{ config('app.name', 'Laravel') }}
        </span>
    </x-logo>
    <div class="side-nav__devider my-6"></div>
    <ul>
        @foreach ($side_menu as $menuKey => $menu)
            @if ($menu == 'devider')
                <li class="side-nav__devider my-6"></li>
            @else
                <li>
                    @role($menu['role'])
                        @can($menu['can'])
                            <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}"
                                class="{{ $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' }}"
                                wire:navigate>
                                <div class="side-menu__icon">
                                    @if ($menu['icon'] != 'double-quotes-l')
                                        <i class="{{ 'ri-' . $menu['icon'] . '-line text-xl' }}"></i>
                                    @else
                                        <i class="{{ 'ri-' . $menu['icon'] . ' text-xl' }}"></i>
                                    @endif
                                </div>
                                <div class="side-menu__title">
                                    {{ $menu['title'] }}
                                    @if (isset($menu['sub_menu']))
                                        <div
                                            class="side-menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}">
                                            <i data-feather="chevron-down"></i>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endcan
                    @endrole
                    @if (isset($menu['sub_menu']))
                        <ul class="{{ $first_level_active_index == $menuKey ? 'side-menu__sub-open' : '' }}">
                            @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                <li>
                                    @role($subMenu['role'])
                                        @can($subMenu['can'])
                                            <a href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name'], $subMenu['params']) : 'javascript:;' }}"
                                                class="{{ $second_level_active_index == $subMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}"
                                                wire:navigate>
                                                <div class="side-menu__icon">
                                                    <i data-feather="activity"></i>
                                                </div>
                                                <div class="side-menu__title">
                                                    {{ $subMenu['title'] }}
                                                    @if (isset($subMenu['sub_menu']))
                                                        <div
                                                            class="side-menu__sub-icon {{ $second_level_active_index == $subMenuKey ? 'transform rotate-180' : '' }}">
                                                            <i data-feather="chevron-down"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                        @endcan
                                    @endrole
                                    @if (isset($subMenu['sub_menu']))
                                        <ul
                                            class="{{ $second_level_active_index == $subMenuKey ? 'side-menu__sub-open' : '' }}">
                                            @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                <li>
                                                    @role($lastSubMenu['role'])
                                                        @can($lastSubMenu['can'])
                                                            <a href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], $lastSubMenu['params']) : 'javascript:;' }}"
                                                                class="{{ $third_level_active_index == $lastSubMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}"
                                                                wire:navigate>
                                                                <div class="side-menu__icon">
                                                                    <i data-feather="zap"></i>
                                                                </div>
                                                                <div class="side-menu__title">{{ $lastSubMenu['title'] }}
                                                                </div>
                                                            </a>
                                                        @endcan
                                                    @endrole
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</nav>
