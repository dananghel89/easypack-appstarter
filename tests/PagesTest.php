<?php

test('the home page renders the welcome page', function () {
	$response = http('GET', '/');

	expect($response['status'])->toBe(200)
		->and($response['body'])->toContain('Welcome to EasyPack Framework');
});

test('an unknown page renders the 404 page with status 404', function () {
	$response = http('GET', '/missing/');

	expect($response['status'])->toBe(404)
		->and($response['body'])->toContain('404');
});
