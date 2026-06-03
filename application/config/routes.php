<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']   = 'Frontend';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;

// ── FRONTEND ─────────────────────────────────────────────
$route['']                  = 'Frontend/index';
$route['post/(:any)']       = 'Frontend/post/$1';
$route['about']             = 'Frontend/about';
$route['work']              = 'Frontend/work';
$route['contact']           = 'Frontend/contact';
$route['contact/send']      = 'Frontend/send_contact';

// ── SERVICES ─────────────────────────────────────────────
$route['services']          = 'Services/index';
$route['services/(:any)']   = 'Services/detail/$1';

// ── BLOG ─────────────────────────────────────────────────
$route['blog']              = 'Blog/index';
$route['blog/(:any)']       = 'Blog/detail/$1';

// ── ADMIN AUTH ────────────────────────────────────────────
$route['admin']             = 'admin/Auth/login';
$route['admin/login']       = 'admin/Auth/login';
$route['admin/logout']      = 'admin/Auth/logout';

// ── ADMIN DASHBOARD ───────────────────────────────────────
$route['admin/dashboard']   = 'admin/Dashboard/index';

// ── ADMIN POSTS ───────────────────────────────────────────
$route['admin/posts']                  = 'admin/Posts/index';
$route['admin/posts/create']           = 'admin/Posts/create';
$route['admin/posts/store']            = 'admin/Posts/store';
$route['admin/posts/edit/(:num)']      = 'admin/Posts/edit/$1';
$route['admin/posts/update/(:num)']    = 'admin/Posts/update/$1';
$route['admin/posts/delete/(:num)']    = 'admin/Posts/delete/$1';
$route['admin/posts/toggle/(:num)']    = 'admin/Posts/toggle/$1';
$route['admin/posts/upload_image']     = 'admin/Posts/upload_image';

// ── ADMIN SERVICES ────────────────────────────────────────
$route['admin/services']                 = 'admin/Services/index';
$route['admin/services/create']          = 'admin/Services/create';
$route['admin/services/store']           = 'admin/Services/store';
$route['admin/services/edit/(:num)']     = 'admin/Services/edit/$1';
$route['admin/services/update/(:num)']   = 'admin/Services/update/$1';
$route['admin/services/delete/(:num)']   = 'admin/Services/delete/$1';
$route['admin/services/toggle/(:num)']   = 'admin/Services/toggle/$1';

// ── ADMIN BLOGS ───────────────────────────────────────────
$route['admin/blogs']                 = 'admin/Blogs/index';
$route['admin/blogs/create']          = 'admin/Blogs/create';
$route['admin/blogs/store']           = 'admin/Blogs/store';
$route['admin/blogs/edit/(:num)']     = 'admin/Blogs/edit/$1';
$route['admin/blogs/update/(:num)']   = 'admin/Blogs/update/$1';
$route['admin/blogs/delete/(:num)']   = 'admin/Blogs/delete/$1';
$route['admin/blogs/toggle/(:num)']   = 'admin/Blogs/toggle/$1';

// ── ADMIN SETTINGS ────────────────────────────────────────
$route['admin/settings']               = 'admin/Settings/index';
$route['admin/settings/update']        = 'admin/Settings/update';

// ── ADMIN ENQUIRIES ───────────────────────────────────────
$route['admin/enquiries']               = 'admin/Enquiries/index';
$route['admin/enquiries/view/(:num)']   = 'admin/Enquiries/view/$1';
$route['admin/enquiries/delete/(:num)'] = 'admin/Enquiries/delete/$1';
