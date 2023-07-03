<?php

namespace App\View\Components;

use App\Models\Supplier;
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
        view()->share('supplier_id', Supplier::where('user_id', auth()->user()->id)->value('id'));

        return view('layouts.app');
    }

    public function sideMenu()
    {
        $supplier_id = Supplier::where('user_id', auth()->user()->id)->value('id');

        return [
            'dashboard' => [
                'can' => 'dashboard',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'admin.dashboard',
                'params' => null,
            ],
            'reports' => [
                'can' => ['supplier_report_regular', 'supplier_report_clicks'],
                'role' => 'supplier',
                'icon' => 'zap',
                'title' => 'Reports',
                'sub_menu' => [
                    'regular' => [
                        'can' => 'supplier_report_regular',
                        'role' => 'supplier',
                        'icon' => 'activity',
                        'route_name' => 'admin.supplier_report_regular',
                        'title' => 'Regular',
                        'params' => null,
                    ],
                    'byViews' => [
                        'can' => 'supplier_report_clicks',
                        'role' => 'supplier',
                        'icon' => 'activity',
                        'route_name' => 'admin.supplier_report_clicks',
                        'title' => 'By View',
                        'params' => null,
                    ],
                ],
            ],
            'user' => [
                'can' => 'user_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'user',
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
            'brand-_transaction' => [
                'can' => 'brand_transaction_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'rss',
                'title' => 'Brand Transactions',
                'route_name' => 'admin.brand.transaction',
                'params' => null,
            ],
            'manufacturer' => [
                'can' => 'manufacturer_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'bar-chart-2',
                'title' => 'Manufacturers',
                'route_name' => 'admin.manufacturer',
                'params' => null,
            ],
            'supplier_categories' => [
                'can' => 'supplier_category_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'chevrons-up',
                'title' => 'Supplier Categories',
                'route_name' => 'admin.supplier-categories',
                'params' => null,
            ],
            'supplier' => [
                'can' => 'supplier_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'fast-forward',
                'title' => 'Suppliers',
                'route_name' => 'admin.supplier',
                'params' => null,
            ],
            'supplier_profile' => [
                'can' => 'supplier_profile_view',
                'role' => 'supplier',
                'icon' => 'user',
                'title' => 'Profile',
                'route_name' => 'admin.supplier_profile',
                'params' => ['supplier' => $supplier_id],
            ],
            'supplier_team_member' => [
                'can' => 'supplier_team_member_list',
                'role' => 'supplier',
                'icon' => 'users',
                'title' => 'Team Members',
                'route_name' => 'admin.supplier_team_member',
                'params' => ['supplier' => $supplier_id],
            ],
            'supplier_certificate' => [
                'can' => 'supplier_certificate_list',
                'role' => 'supplier',
                'icon' => 'credit-card',
                'title' => 'Certificates',
                'route_name' => 'admin.supplier_certificate',
                'params' => ['supplier' => $supplier_id],
            ],
            'supplier_testimonial' => [
                'can' => 'supplier_testimonial_list',
                'role' => 'supplier',
                'icon' => 'user-plus',
                'title' => 'Testimonials',
                'route_name' => 'admin.supplier_testimonial',
                'params' => ['supplier' => $supplier_id],
            ],
            'supplier_project' => [
                'can' => 'supplier_project_list',
                'role' => 'supplier',
                'icon' => 'file-text',
                'title' => 'Projects',
                'route_name' => 'admin.supplier_project',
                'params' => ['supplier' => $supplier_id],
            ],
            'supplier_product' => [
                'can' => 'supplier_product_list',
                'role' => 'supplier',
                'icon' => 'package',
                'title' => 'Products',
                'route_name' => 'admin.supplier_product',
                'params' => ['supplier' => $supplier_id],
            ],
            'supplier_transaction' => [
                'can' => 'supplier_transaction_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'shopping-bag',
                'title' => 'Supplier Transactions',
                'route_name' => 'admin.supplier.transaction',
                'params' => null,
            ],
            'contractor' => [
                'can' => 'contractor_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'bar-chart-2',
                'title' => 'Contractors',
                'route_name' => 'admin.contractor',
                'params' => null,
            ],
            'sub_contractor' => [
                'can' => 'sub_contractor_list',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'link',
                'title' => 'Sub Contractors',
                'route_name' => 'admin.sub-contractor',
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
            'career' => [
                'can' => 'career',
                'role' => auth()->user()->roles->first()->slug,
                'icon' => 'briefcase',
                'title' => 'Career',
                'route_name' => 'admin.career',
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
