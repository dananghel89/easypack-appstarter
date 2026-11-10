<?php

/**
 * Checks against the real Apache vhost (http://easypack.test), which applies
 * public/.htaccess. Skipped when the vhost isn't reachable.
 *
 * Only redirects are checked: with APP_DEBUG = true, PHP notices printed
 * before the headers can change the status code (404 → 200).
 */

function apache_request(string $method, string $path): array
{
    $ch = curl_init('http://easypack.test' . $path);

    curl_setopt_array($ch, [
        CURLOPT_CUSTOMREQUEST  => $method,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_TIMEOUT        => 5,
        CURLOPT_POSTFIELDS     => $method === 'POST' ? 'a=1' : null,
    ]);

    $body = curl_exec($ch);

    return ['status' => curl_getinfo($ch, CURLINFO_RESPONSE_CODE), 'body' => (string) $body];
}

$reachable = (function () {
    $ch = curl_init('http://easypack.test/');
    curl_setopt_array($ch, [CURLOPT_NOBODY => true, CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 2]);

    return curl_exec($ch) !== false;
})();

test('R06: a POST without a trailing slash is not redirected', function () {
    expect(apache_request('POST', '/contact')['status'])->not->toBeIn([301, 302]);
})->skip(!$reachable, 'http://easypack.test is not reachable');

test('R06: a GET without a trailing slash is not redirected', function () {
    expect(apache_request('GET', '/missing')['status'])->not->toBeIn([301, 302]);
})->skip(!$reachable, 'http://easypack.test is not reachable');
