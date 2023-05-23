<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Application
Breadcrumbs::for('#', function (BreadcrumbTrail $trail) {
    $trail->push('Application', '/');
});

// Application > User
Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('User', route('admin.user'));
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

// Application > Manufacturer
Breadcrumbs::for('manufacturer.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Manufacturer', route('admin.manufacturer'));
});

// Application > Supplier
Breadcrumbs::for('supplier.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Supplier', route('admin.supplier'));
});

// Application > Supplier Category
Breadcrumbs::for('supplier-category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Supplier Category', route('admin.supplier-categories'));
});

// Application > Supplier > [Supplier Profile]
Breadcrumbs::for('supplier.profile', function (BreadcrumbTrail $trail, $supplier) {
    $trail->parent('supplier.index');
    $trail->push($supplier->company_name, route('admin.supplier_profile', $supplier));
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
Breadcrumbs::for('homepage.return_refund', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Return Refund', route('admin.return_refund'));
});

// Application > Career
Breadcrumbs::for('homepage.career', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Career', route('admin.career'));
});
