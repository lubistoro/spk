<?php

include 'config.php';
include 'func.php';

define('PATH', rtrim(strtok($_SERVER['REQUEST_URI'], '?'), '/'));
define('S', array_slice(explode('/', PATH), 1));



/*
------------------------------------------------------------------------
ROUTES
------------------------------------------------------------------------
*/

if (PATH === '/spk') {
	include 'views/home.php'; die;
}

else if (preg_match('/^\/spk\/(kbli-2015|kbji-2014|kbki-barang|kbki-jasa|kbli-2009|kbli-2005|kbji-2002)$/', PATH)) {
	$data = [
		'path' => S[1],
		'title' => [
			'kbli-2015' => 'Klasifikasi Baku Lapangan Usaha Indonesia 2015',
			'kbji-2014' => 'Klasifikasi Baku Jabatan Indonesia 2014',
			'kbki-barang' => 'Klasifikasi Baku Komoditi Indonesia Indonesia - Barang',
			'kbki-jasa' => 'Klasifikasi Baku Komoditi Indonesia - Jasa',
			'kbli-2009' => 'Klasifikasi Baku Lapangan Usaha Indonesia 2009',
			'kbli-2005' => 'Klasifikasi Baku Lapangan Usaha Indonesia 2005',
			'kbji-2002' => 'Klasifikasi Baku Jabatan Indonesia 2002',
		][S[1]],
		'title-short' => explode('-', S[1]),
	];
	include 'views/main.php'; die;
}

else {
	http_response_code(404);
	include 'views/404.php';
}
