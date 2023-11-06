<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <x-logo class="mr-auto">
            <span class="ml-3 text-lg text-white">
                {{ config('app.name', 'Laravel') }}
            </span>
        </x-logo>
        <a href="javascript:;" id="mobile-menu-toggler">
            <i data-feather="bar-chart-2" class="h-8 w-8 -rotate-90 transform text-white"></i>
        </a>
    </div>
    <ul class="hidden border-t border-white/[0.08] py-5">
        @foreach ($side_menu as $menuKey => $menu)
            @if ($menu == 'devider')
                <li class="menu__devider my-6"></li>
            @else
                <li>
                    @role($menu['role'])
                        @can($menu['can'])
                            <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}"
                                class="{{ $first_level_active_index == $menuKey ? 'menu menu--active' : 'menu' }}"
                                wire:navigate>
                                <div class="menu__icon">
                                    <i class="{{ 'ri-' . $menu['icon'] . '-line text-xl' }}"></i>
                                </div>
                                <div class="menu__title">
                                    {{ $menu['title'] }}{{ $menu['role'] }}
                                    @if (isset($menu['sub_menu']))
                                        <i data-feather="chevron-down"
                                            class="menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}"></i>
                                    @endif
                                </div>
                            </a>
                        @endcan
                    @endrole
                    @if (isset($menu['sub_menu']))
                        <ul class="{{ $first_level_active_index == $menuKey ? 'menu__sub-open' : '' }}">
                            @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                <li>
                                    @role($subMenu['role'])
                                        @can($subMenu['can'])
                                            <a href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name'], $subMenu['params']) : 'javascript:;' }}"
                                                class="{{ $second_level_active_index == $subMenuKey ? 'menu menu--active' : 'menu' }}"
                                                wire:navigate>
                                                <div class="menu__icon">
                                                    <i data-feather="activity"></i>
                                                </div>
                                                <div class="menu__title">
                                                    {{ $subMenu['title'] }}
                                                    @if (isset($subMenu['sub_menu']))
                                                        <i data-feather="chevron-down"
                                                            class="menu__sub-icon {{ $second_level_active_index == $subMenuKey ? 'transform rotate-180' : '' }}"></i>
                                                    @endif
                                                </div>
                                            </a>
                                        @endcan
                                    @endrole
                                    @if (isset($subMenu['sub_menu']))
                                        <ul
                                            class="{{ $second_level_active_index == $subMenuKey ? 'menu__sub-open' : '' }}">
                                            @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                <li>
                                                    @role($lastSubMenu['role'])
                                                        @can($lastSubMenu['can'])
                                                            <a href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], $lastSubMenu['params']) : 'javascript:;' }}"
                                                                class="{{ $third_level_active_index == $lastSubMenuKey ? 'menu menu--active' : 'menu' }}"
                                                                wire:navigate>
                                                                <div class="menu__icon">
                                                                    <i data-feather="zap"></i>
                                                                </div>
                                                                <div class="menu__title">{{ $lastSubMenu['title'] }}</div>
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
</div>
