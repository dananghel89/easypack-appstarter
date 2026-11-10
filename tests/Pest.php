<?php
/**
 * Test bootstrap.
 *
 * The app is tested over HTTP: Tests\Support\Server runs public/index.php on
 * PHP's built-in web server, so every request is a real, fresh PHP request.
 * The app reads your .env (copy .env.example first).
 */

use Tests\Support\Server;

/**
 * Send a request to the app through PHP's built-in web server.
 *
 * @return array{status: int, headers: array<string, string[]>, body: string}
 */
function http(string $method, string $path, array $options = []): array
{
	return Server::request($method, $path, $options);
}
