<?php

// Absolute path to site directory.
if ( !defined('ABS_PATH') ) {
	define('ABS_PATH', dirname(__DIR__));
}

// Register the auto loader.
require dirname(__DIR__) . '/vendor/autoload.php';

// Load app helper functions.
require __DIR__ . '/helpers.php';

// Init the framework.
epack_init();
