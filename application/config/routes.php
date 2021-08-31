<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Dashboard/auth/login']['post'] = 'welcome/do_Login';
$route['Dashboard/auth/logout']['get'] = 'welcome/do_Logout';

$route['admin'] = 'Welcome/admin';
$route['user'] = 'Welcome/daftar';
$route['anggota/detail/(:any)'] = 'Welcome/detail_qr/$1';
$route['Dashboard/admin'] = 'DashboardController';
$route['char'] = 'DashboardController/chart';
 $route['Dashboard/admin/banom'] = 'DashboardController/statistik_banom';
$route['Dashboard/admin/v2'] = 'DashboardController/dashbordv2';

$route['public/anggota'] = 'PublicController';
$route['check'] = 'PublicController/check';
$route['public/anggota/view/(:any)'] = 'PublicController/view/$1';
$route['public/anggota/create'] = 'PublicController/tambah_anggota';
$route['public/anggota/update'] = 'PublicController/update';

// $route['public/anggota/tambah_aksi'] = 'PublicController/tambah_aksi';
$route['public/anggota/edit/(:any)'] = 'PublicController/edit_anggota/$1';
$route['public/anggota/update'] = 'PublicController/update';


$route['Dashboard/admin/data/user/list'] = 'UsersController';
$route['Dashboard/admin/data/user/add'] = 'UsersController/tambah_user';
$route['Dashboard/admin/data/user/edit/(:any)'] = 'UsersController/edit_user/$1';
$route['Dashboard/admin/data/user/list/bin'] = 'UsersController/viewbin';

$route['Dashboard/admin/data/anggota/list'] = 'AnggotaController';
$route['Dashboard/admin/data/anggota/add'] = 'AnggotaController/tambah_anggota';
$route['Dashboard/admin/data/anggota/all'] = 'AnggotaController/all';
$route['Dashboard/admin/data/anggota/temp'] = 'AnggotaController/temp';
$route['Dashboard/admin/data/anggota/today'] = 'AnggotaController/today';
$route['Dashboard/admin/data/anggota/trash'] = 'AnggotaController/trash';

$route['Dashboard/admin/data/anggota/jenis1'] = 'AnggotaController/jenis1';
$route['Dashboard/admin/data/anggota/jenis2'] = 'AnggotaController/jenis2';
$route['Dashboard/admin/data/anggota/jenis3'] = 'AnggotaController/jenis3';

$route['Dashboard/admin/data/user/edit/(:any)'] = 'UsersController/edit_user/$1';
$route['Dashboard/admin/data/user/list/bin'] = 'UsersController/viewbin';

$route['Dashboard/admin/data/anggota/list/banom'] = 'AnggotaController/banom';
$route['Dashboard/admin/data/anggota/list/disabilitas'] = 'AnggotaController/disabilitas';
$route['Dashboard/admin/data/anggota/list/jamkes'] = 'AnggotaController/jamkes';
$route['Dashboard/admin/data/anggota/list/jk'] = 'AnggotaController/jk';
$route['Dashboard/admin/data/anggota/list/pekerjaan'] = 'AnggotaController/pekerjaan';
$route['Dashboard/admin/data/anggota/list/pendapatan'] = 'AnggotaController/pendapatan';
$route['Dashboard/admin/data/anggota/list/pendidikan'] = 'AnggotaController/pendidikan';
$route['Dashboard/admin/data/anggota/list/penyakit'] = 'AnggotaController/penyakit';
$route['Dashboard/admin/data/anggota/list/status'] = 'AnggotaController/status';
$route['Dashboard/admin/data/anggota/list/rumah'] = 'AnggotaController/rumah';

$route['Dashboard/admin/data/anggota/list/edit/(:any)'] = 'AnggotaController/edit_anggota/$1';
$route['Dashboard/admin/data/anggota/list/delete/(:any)'] = 'AnggotaController/delete_anggota/$1';
$route['Dashboard/admin/data/anggota/list/update'] = 'AnggotaController/update';


$route['Dashboard/admin/data/anggota/list/detail/(:any)'] = 'AnggotaController/detail_anggota/$1';
$route['Dashboard/admin/data/anggota/list/excel'] = 'AnggotaController/excel';
$route['Dashboard/admin/data/anggota/list/printpdf'] = 'AnggotaController/printpdf';

$route['Dashboard/admin/data/kartu'] = 'KartuController';
$route['Dashboard/admin/data/kartu/filter/(:any)/(:any)'] = 'KartuController/filter/$1/$1';
$route['Dashboard/admin/data/kartu/cetak'] = 'KartuController/cetak';
$route['Dashboard/admin/data/kartu/priew'] = 'KartuController/priew';
$route['Dashboard/admin/data/kartu/printed'] = 'KartuController/printed';
$route['Dashboard/admin/data/kartu/unprint'] = 'KartuController/unprint';
$route['Dashboard/admin/data/kartu/cetak_select'] = 'KartuController/cetak_select';
$route['Dashboard/admin/data/kartu/cetak_kartu'] = 'KartuController/cetak_kartu';
$route['Dashboard/admin/data/kartu/kartu_belakang'] = 'KartuController/kartu_belakang';
// $route['Dashboard/admin/data/kartu/cetak_pilih'] = 'KartuController/cetak_pilih';
