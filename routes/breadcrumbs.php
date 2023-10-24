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

// Application > Testimonial
Breadcrumbs::for('testimonial.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Testimonial', route('admin.testimonial'));
});

// Application > Brand
Breadcrumbs::for('brand.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Brand', route('admin.brand'));
});

// Application > Product
Breadcrumbs::for('product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Product', route('admin.product'));
});

// Application > Order
Breadcrumbs::for('orders.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Order', route('admin.orders'));
});

// Application > Product Reviews
Breadcrumbs::for('product.review', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Product Reviews', route('admin.product_review'));
});

// Application > Address
Breadcrumbs::for('address.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Address', route('admin.address'));
});

// Application > Vendor
Breadcrumbs::for('vendor.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Vendor', route('admin.vendor'));
});

// Application > Category
Breadcrumbs::for('category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Category', route('admin.categories'));
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
