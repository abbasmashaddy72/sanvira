<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        view()->share('dark_mode', session()->has('dark_mode') ? filter_var(session('dark_mode'), FILTER_VALIDATE_BOOLEAN) : false);
        view()->share('side_menu', $this->sideMenu());
        $pageName = request()->route()->getName();
        $activeMenu = $this->activeMenu($pageName);
        view()->share('first_level_active_index', $activeMenu['first_level_active_index']);
        view()->share('second_level_active_index', $activeMenu['second_level_active_index']);
        view()->share('third_level_active_index', $activeMenu['third_level_active_index']);

        return view('layouts.app');
    }

    public function sideMenu()
    {
        return [
            'dashboard' => [
                'can' => 'dashboard',
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'admin.dashboard',
            ],
            'user' => [
                'can' => 'user_list',
                'icon' => 'user',
                'title' => 'Users',
                'route_name' => 'admin.user',
            ],
            'role' => [
                'can' => 'role_list',
                'icon' => 'settings',
                'title' => 'Roles',
                'route_name' => 'admin.role',
            ],
            'brand' => [
                'can' => 'brand_list',
                'icon' => 'globe',
                'title' => 'Brands',
                'route_name' => 'admin.brand',
            ],
            'brand-_transaction' => [
                'can' => 'brand_transaction_list',
                'icon' => 'rss',
                'title' => 'Brand Transactions',
                'route_name' => 'admin.brand.transaction',
            ],
            'manufacturer' => [
                'can' => 'manufacturer_list',
                'icon' => 'bar-chart-2',
                'title' => 'Manufacturers',
                'route_name' => 'admin.manufacturer',
            ],
            'supplier_categories' => [
                'can' => 'supplier_categories_list',
                'icon' => 'chevrons-up',
                'title' => 'Supplier Categories',
                'route_name' => 'admin.supplier-categories',
            ],
            'supplier' => [
                'can' => 'supplier_list',
                'icon' => 'fast-forward',
                'title' => 'Suppliers',
                'route_name' => 'admin.supplier',
            ],
            'supplier_transaction' => [
                'can' => 'supplier_transaction_list',
                'icon' => 'shopping-bag',
                'title' => 'Supplier Transactions',
                'route_name' => 'admin.supplier.transaction',
            ],
            'contractor' => [
                'can' => 'contractor_list',
                'icon' => 'bar-chart-2',
                'title' => 'Contractors',
                'route_name' => 'admin.contractor',
            ],
            'sub_contractor' => [
                'can' => 'sub_contractor_list',
                'icon' => 'link',
                'title' => 'Sub Contractors',
                'route_name' => 'admin.sub-contractor',
            ],
            'homepage' => [
                'can' => 'homepage',
                'icon' => 'layout',
                'title' => 'Homepage',
                'route_name' => 'admin.homepage',
            ],
            'privacy_policy' => [
                'can' => 'privacy_policy',
                'icon' => 'lock',
                'title' => 'Privacy Policy',
                'route_name' => 'admin.privacy_policy',
            ],
            'terms_of_use' => [
                'can' => 'terms_of_use',
                'icon' => 'shield',
                'title' => 'Terms of Use',
                'route_name' => 'admin.terms_of_use',
            ],
            'return_refunds' => [
                'can' => 'return_refunds',
                'icon' => 'refresh-ccw',
                'title' => 'Return Refund',
                'route_name' => 'admin.return_refunds',
            ],
            'career' => [
                'can' => 'career',
                'icon' => 'briefcase',
                'title' => 'Career',
                'route_name' => 'admin.career',
            ],
        ];
    }

    /**
     * Determine active menu & submenu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activeMenu($pageName)
    {
        $firstLevelActiveIndex = '';
        $secondLevelActiveIndex = '';
        $thirdLevelActiveIndex = '';

        foreach ($this->sideMenu() as $menuKey => $menu) {
            if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                $firstLevelActiveIndex = $menuKey;
            }

            if (!(isset($menu['sub_menu']) ?? $menu['sub_menu'] = [])) {
                continue;
            }

            foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {

                if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                    $secondLevelActiveIndex = $subMenuKey;
                }

                if (!isset($subMenu['sub_menu'])) {
                    continue;
                }

                foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {

                    if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                        $firstLevelActiveIndex = $menuKey;
                        $secondLevelActiveIndex = $subMenuKey;
                        $thirdLevelActiveIndex = $lastSubMenuKey;
                    }
                }
            }
        }

        return [
            'first_level_active_index' => $firstLevelActiveIndex,
            'second_level_active_index' => $secondLevelActiveIndex,
            'third_level_active_index' => $thirdLevelActiveIndex
        ];
    }
}
