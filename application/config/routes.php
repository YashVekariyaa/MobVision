<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//Default 
$route['default_controller'] = 'Pages';
$route['404_override'] = 'pages/page_not_found';
$route['translate_uri_dashes'] = FALSE;

//user
$route['home'] = 'pages/index';
$route['about-us'] = 'pages/about_us';
$route['privacy-policy'] = 'pages/privacy_policy';
$route['return-policy'] = 'pages/return_policy';
$route['terms-and-conditions'] = 'pages/terms_and_conditions';
$route['faqs'] = 'pages/faqs';
$route['contact-us'] = 'pages/contact_us';
$route['feedback'] = 'pages/feedback';
$route['login-register'] = 'pages/login_register';
$route['forget-password'] = 'pages/forget_password';
$route['collection/?(:any)?/?(:any)?'] = 'pages/collection/$2/$3';
$route['product-detail/?(:any)?'] = 'pages/product_detail/$2';
$route['view-cart'] = 'pages/view_cart';
$route['checkout'] = 'pages/checkout';
$route['order-success'] = 'pages/order_success';
$route['order-fail'] = 'pages/order_fail';
$route['order-confirmation'] = 'pages/order_confirmation';
$route['resend-otp'] = 'pages/resend_otp';








//Member
$route['member-home'] = 'member/member_home';
$route['member-profile'] = 'member/member_profile';
$route['member-setting'] = 'member/member_setting';
$route['member-logout'] = 'member/logout';
$route['member-address'] = 'member/member_address';
$route['member-wishlist'] = 'member/member_wishlist';
$route['member-orders'] = 'member/member_orders';
$route['member-order-detail/(:any)'] = 'member/member_order_detail/$2';
$route['member-review'] = 'member/member_review';





//admin

$route['admin-login/?(:any)?'] = 'authorize/index/$2';
$route['admin-logout'] = 'authorize/logout';
$route['admin-forget-password'] = 'authorize/forget_password';
$route['admin-home'] = 'authorize/dashboard';
$route['manage-contact-us/?(:any)?'] = 'authorize/manage_contact/$2';
$route['manage-feedback'] = 'authorize/manage_feedback';
$route['manage-feedback'] = 'authorize/manage_feedback';
$route['manage-email-subscriber'] = 'authorize/manage_email_subscriber';
$route['manage-banner/?(:any)?'] = 'authorize/manage_banner/$2';
$route['manage-member'] = 'authorize/manage_member';
$route['manage-about-us/?(:any)?'] = 'authorize/manage_about_us/$2';
$route['manage-privacy-policy/?(:any)?'] = 'authorize/manage_privacy_policy/$2';
$route['manage-return-policy/?(:any)?'] = 'authorize/manage_return_policy/$2';
$route['manage-terms-condition/?(:any)?'] = 'authorize/manage_terms_condition/$2';
$route['manage-faqs/?(:any)?'] = 'authorize/manage_faqs/$2';
$route['manage-country/?(:any)?'] = 'authorize/manage_country/$2';
$route['manage-state/?(:any)?'] = 'authorize/manage_state/$2';
$route['manage-city/?(:any)?'] = 'authorize/manage_city/$2';
$route['manage-main-category/?(:any)?'] = 'authorize/manage_main_category/$2';
$route['manage-sub-category/?(:any)?'] = 'authorize/manage_sub_category/$2';
$route['manage-peta-category/?(:any)?'] = 'authorize/manage_peta_category/$2';
$route['manage-add-new-product'] = 'authorize/manage_add_new_product';
$route['manage-view-all-product'] = 'authorize/manage_view_all_product';
$route['manage-product-review'] = 'authorize/manage_product_review';
$route['manage-offers'] = 'authorize/manage_offers';
$route['manage-promocode'] = 'authorize/manage_promocode';
$route['manage-pending-orders'] = 'authorize/manage_pending_orders';
$route['manage-confirm-orders'] = 'authorize/manage_confirm_orders';
$route['manage-cancel-orders'] = 'authorize/manage_cancel_orders';
$route['admin-setting'] = 'authorize/manage_setting';
$route['delete/(:any)/(:any)'] = 'authorize/delete/$2/$3';
