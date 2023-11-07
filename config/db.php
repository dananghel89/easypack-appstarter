<?php

return [
	'mysql' => [
		'host'     => env('MYSQL_HOST', 'localhost'),
		'port'     => env('MYSQL_PORT', 3306),
		'database' => env('MYSQL_DATABASE', null),
		'charset'  => env('MYSQL_CHARSET', 'utf8mb4'),
		'timezone' => env('MYSQL_TIMEZONE', '+00:00'),
		'username' => env('MYSQL_USERNAME', 'root'),
		'password' => env('MYSQL_PASSWORD', null),
		'prefix'   => env('MYSQL_PREFIX', null),
		'ssl_key'  => env('MYSQL_SSL_KEY', null),
		'ssl_cert' => env('MYSQL_SSL_CERT', null),
		'ssl_ca'   => env('MYSQL_SSL_CA', null),
	]
];
