<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'LoginController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'LoginController/index';
$route['proses-login'] = 'LoginController/logins';
$route['logout'] = 'LoginController/logout';

$route['register'] = 'RegisterController/index';
$route['proses-register'] = 'RegisterController/register';

//Biodata Pelamar
$route['dashboard'] = 'DashboardController/index';
$route['pelamar-store'] = 'DashboardController/store';
$route['biodata'] = 'DashboardController/biodata';
$route['pelamar'] = 'DashboardController/pelamar';
$route['pelamar/detail/(:any)'] = 'DashboardController/detail/(:any)';

//Pendidikan
$route['pendidikan'] = 'PendidikanController/index';
$route['pendidikan/simpan'] = 'PendidikanController/store';
$route['pendidikan/hapus/(:any)'] = 'PendidikanController/destroy/(:any)';

//Pelatihan
$route['pelatihan'] = 'PelatihanController/index';
$route['pelatihan/simpan'] = 'PelatihanController/store';
$route['pelatihan/hapus/(:any)'] = 'PelatihanController/destroy/(:any)';

//Pekerjaan
$route['pekerjaan'] = 'PekerjaanController/index';
$route['pekerjaan/simpan'] = 'PekerjaanController/store';
$route['pekerjaan/hapus/(:any)'] = 'PekerjaanController/destroy/(:any)';


//Settingan 
$route['(:any)'] = 'errors/show_404';
$route['(:any)/(:any)'] = 'errors/show_404';
$route['(:any)/(:any)/(:any)'] = 'errors/show_404';
