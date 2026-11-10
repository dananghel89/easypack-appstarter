<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to <?= e($name) ?></title>
	<meta name="description" content="Simple PHP framework for building web applications">
	<link rel="icon" href="/favicon.ico">
	<style>
		:root {
			--ink: #1f2933;
			--muted: #616e7c;
			--line: #e4e7eb;
			--paper: #ffffff;
			--canvas: #f5f7fa;
		}
		* { box-sizing: border-box; }
		body {
			margin: 0;
			min-height: 100vh;
			display: flex;
			flex-direction: column;
			background: var(--canvas);
			color: var(--ink);
			font: 16px/1.6 system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
		}
		main {
			flex: 1;
			width: 100%;
			max-width: 760px;
			margin: 0 auto;
			padding: 4rem 1.25rem 2rem;
		}
		h1 { margin: 0 0 .25rem; font-size: 2.25rem; line-height: 1.2; }
		.lead { margin: 0 0 2.5rem; color: var(--muted); font-size: 1.15rem; }
		.card {
			background: var(--paper);
			border: 1px solid var(--line);
			border-radius: 8px;
			padding: 1.5rem;
			margin-bottom: 1rem;
		}
		.card h2 { margin: 0 0 .5rem; font-size: 1.1rem; }
		.card p { margin: 0 0 .75rem; }
		code {
			padding: .1rem .3rem;
			background: var(--canvas);
			border-radius: 4px;
			font: .9rem/1.5 ui-monospace, Consolas, monospace;
		}
		pre code { display: block; padding: .5rem .75rem; }
		pre { margin: 0; }
		footer {
			padding: 1.5rem 1.25rem;
			text-align: center;
			color: var(--muted);
			font-size: .875rem;
			border-top: 1px solid var(--line);
		}
	</style>
</head>
<body>
	<main>
		<h1>Welcome to <?= e($name) ?></h1>
		<p class="lead">A simple PHP framework for building web applications.</p>

		<section class="card">
			<h2>This page</h2>
			<p>It is rendered by the view:</p>
			<pre><code>app/Views/welcome.php</code></pre>
		</section>

		<section class="card">
			<h2>Its controller and route</h2>
			<p>The <code>GET /</code> route in <code>routes/web.php</code> calls:</p>
			<pre><code>app/Controllers/Home.php</code></pre>
		</section>
	</main>

	<footer>
		&copy; <?= date('Y') ?> <?= e($name) ?>
	</footer>
</body>
</html>
