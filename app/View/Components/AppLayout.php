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
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'admin.dashboard',
                'params' => null,
            ],
            'profile' => [
                'can' => 'access-specific-urls',
                'role' => 'buyer',
                'icon' => 'user',
                'title' => 'Profile',
                'route_name' => 'admin.profile.edit',
                'params' => null,
            ],
            'order' => [
                'can' => 'order_list',
                'role' => 'buyer',
                'icon' => 'shopping-cart',
                'title' => 'Orders',
                'route_name' => 'admin.orders',
                'params' => null,
            ],
            'product_review' => [
                'can' => 'product_review_list',
                'role' => 'buyer',
                'icon' => 'star',
                'title' => 'Product Reviews',
                'route_name' => 'admin.product_review',
                'params' => null,
            ],
            'address' => [
                'can' => 'address_list',
                'role' => 'buyer',
                'icon' => 'file-plus',
                'title' => 'Address',
                'route_name' => 'admin.address',
                'params' => null,
            ],
            // 'support' => [
            //     'can' => 'support_view',
            //     'role' => 'buyer',
            //     'icon' => 'activity',
            //     'title' => 'Support Ticket',
            //     'route_name' => 'admin.support',
            //     'params' => null,
            // ],
            'user' => [
                'can' => 'user_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'users',
                'title' => 'Users',
                'route_name' => 'admin.user',
                'params' => null,
            ],
            'role' => [
                'can' => 'role_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'settings',
                'title' => 'Roles',
                'route_name' => 'admin.role',
                'params' => null,
            ],
            'brand' => [
                'can' => 'brand_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'globe',
                'title' => 'Brands',
                'route_name' => 'admin.brand',
                'params' => null,
            ],
            'vendor' => [
                'can' => 'vendor_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'bar-chart-2',
                'title' => 'Vendors',
                'route_name' => 'admin.vendor',
                'params' => null,
            ],
            'categories' => [
                'can' => 'category_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'chevrons-up',
                'title' => 'Categories',
                'route_name' => 'admin.categories',
                'params' => null,
            ],
            'product' => [
                'can' => 'product_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'package',
                'title' => 'Products',
                'route_name' => 'admin.product',
                'params' => null,
            ],
            'testimonial' => [
                'can' => 'testimonial_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'user-plus',
                'title' => 'Testimonials',
                'route_name' => 'admin.testimonial',
                'params' => null,
            ],
            'homepage' => [
                'can' => 'homepage',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'layout',
                'title' => 'Homepage',
                'route_name' => 'admin.homepage',
                'params' => null,
            ],
            'privacy_policy' => [
                'can' => 'privacy_policy',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'lock',
                'title' => 'Privacy Policy',
                'route_name' => 'admin.privacy_policy',
                'params' => null,
            ],
            'terms_of_use' => [
                'can' => 'terms_of_use',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'shield',
                'title' => 'Terms of Use',
                'route_name' => 'admin.terms_of_use',
                'params' => null,
            ],
            'return_refunds' => [
                'can' => 'return_refunds',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'refresh-ccw',
                'title' => 'Return Refund',
                'route_name' => 'admin.return_refunds',
                'params' => null,
            ],
            'contact_us' => [
                'can' => 'contact_us',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'phone-forwarded',
                'title' => 'Contact Us',
                'route_name' => 'admin.contact_us',
                'params' => null,
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
            'third_level_active_index' => $thirdLevelActiveIndex,
        ];
    }
}
