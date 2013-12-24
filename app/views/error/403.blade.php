<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Error 403 - Forbidden</title>
	<meta name="viewport" content="width=device-width">
	@include('partials.errorcss')
</head>
<body>
	<div class="wrapper">
		<div class="error-spacer"></div>
		<div role="main" class="main">
			<h1>Access Forbidden</h1>

			<h2>Server Error: 403 (Forbidden)</h2>

			<hr>

			<h3>What does this mean?</h3>

			<p>
				You don't have the necessary permissions to access to this page.
			</p>

			<p>
				Perhaps you would like to go to our <a href="{{ URL::route('home'); }}">home page</a>?
			</p>
		</div>
	</div>
</body>
</html>
