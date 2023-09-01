<?php

// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;
// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Application
Breadcrumbs::for('#', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Application > User
Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('User', route('admin.user'));
});

// Application > Profile
Breadcrumbs::for('profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Profile', route('admin.profile.edit'));
});

// Application > Role
Breadcrumbs::for('role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Role', route('admin.role'));
});

// Application > Brand
Breadcrumbs::for('brand.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Brand', route('admin.brand'));
});

// Application > Brand Transaction
Breadcrumbs::for('brand.transaction', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Brand Transactions', route('admin.brand.transaction'));
});

// Application > Manufacturer
Breadcrumbs::for('manufacturer.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Manufacturer', route('admin.manufacturer'));
});

// Application > Suppliers
Breadcrumbs::for('supplier.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Suppliers', route('admin.supplier'));
});

// Application > Transaction
Breadcrumbs::for('supplier.transaction', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Supplier Transactions', route('admin.supplier.transaction'));
});

// Application > Supplier Category
Breadcrumbs::for('supplier-category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Supplier Category', route('admin.supplier-categories'));
});

// Application > Suppliers > [Supplier Profile]
Breadcrumbs::for('supplier.profile', function (BreadcrumbTrail $trail, $supplier) {
    $trail->parent('supplier.index');
    $trail->push($supplier->company_name, route('admin.supplier_profile', $supplier));
});

// Application > Supplier Report Regular
Breadcrumbs::for('supplier.report.regular', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Supplier Report Regular', route('admin.supplier_report_regular'));
});

// Application > Supplier Report Clicks
Breadcrumbs::for('supplier.report.clicks', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Supplier Report Clicks', route('admin.supplier_report_clicks'));
});

// Application > Contractor
Breadcrumbs::for('contractor.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Contractor', route('admin.contractor'));
});

// Application > Sub Contractor
Breadcrumbs::for('sub-contractor.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Sub Contractor', route('admin.sub-contractor'));
});

// Application > HomePage
Breadcrumbs::for('homepage.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('HomePage', route('admin.homepage'));
});

// Application > Privacy Policy
Breadcrumbs::for('homepage.privacy_policy', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Privacy Policy', route('admin.privacy_policy'));
});

// Application > Terms of Use
Breadcrumbs::for('homepage.terms_of_use', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Terms of Use', route('admin.terms_of_use'));
});

// Application > Return Refund
Breadcrumbs::for('homepage.return_refunds', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Return Refund', route('admin.return_refunds'));
});

// Application > Career
Breadcrumbs::for('homepage.career', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Career', route('admin.career'));
});
