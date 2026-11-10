<?php

test('the built-in web server serves the app', function () {
	expect(http('GET', '/')['status'])->toBe(200);
});
