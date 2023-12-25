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
                'icon' => 'dashboard',
                'title' => 'Dashboard',
                'route_name' => 'admin.dashboard',
                'params' => null,
            ],
            'role' => [
                'can' => 'role_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'user-settings',
                'title' => 'Roles',
                'route_name' => 'admin.role',
                'params' => null,
            ],
            'user' => [
                'can' => 'user_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'user',
                'title' => 'Users',
                'route_name' => 'admin.user',
                'params' => null,
            ],
            'profile' => [
                'can' => 'access-specific-urls',
                'role' => 'buyer',
                'icon' => 'profile',
                'title' => 'Profile',
                'route_name' => 'admin.profile.edit',
                'params' => null,
            ],
            'blogs' => [
                'can' => 'blog_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'news',
                'title' => 'Blogs',
                'route_name' => 'admin.blog',
                'params' => null,
            ],
            'categories' => [
                'can' => 'category_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'article',
                'title' => 'Categories',
                'route_name' => 'admin.categories',
                'params' => null,
            ],
            'product' => [
                'can' => 'product_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'box-3',
                'title' => 'Products',
                'route_name' => 'admin.product',
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
            'testimonial' => [
                'can' => 'testimonial_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'double-quotes-l',
                'title' => 'Testimonials',
                'route_name' => 'admin.testimonial',
                'params' => null,
            ],
            'faq' => [
                'can' => 'faq_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'question-answer',
                'title' => 'Faqs',
                'route_name' => 'admin.faq',
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
                'icon' => 'shield-user',
                'title' => 'Terms of Use',
                'route_name' => 'admin.terms_of_use',
                'params' => null,
            ],
            'return_refunds' => [
                'can' => 'return_refunds',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'refund',
                'title' => 'Return Refund',
                'route_name' => 'admin.return_refunds',
                'params' => null,
            ],
            'contact_us' => [
                'can' => 'contact_us_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'contacts-book',
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
            if ($menu !== 'devider' && isset($menu['route_name']) && strpos($pageName, $menu['route_name']) === 0) {
                $firstLevelActiveIndex = $menuKey;
            }

            if (!(isset($menu['sub_menu']) ?? $menu['sub_menu'] = [])) {
                continue;
            }

            foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                if (isset($subMenu['route_name']) && strpos($pageName, $subMenu['route_name']) === 0 && $menuKey != 'menu-layout') {
                    $firstLevelActiveIndex = $menuKey;
                    $secondLevelActiveIndex = $subMenuKey;
                }

                if (!isset($subMenu['sub_menu'])) {
                    continue;
                }

                foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                    if (isset($lastSubMenu['route_name']) && strpos($pageName, $lastSubMenu['route_name']) === 0) {
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
