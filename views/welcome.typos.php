<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>{{ title }}</title>

	<link rel="stylesheet" href="{{ asset('css/alquimist.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fonts/all.css') }}">
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
	<link rel="stylesheet" href="{{ asset('css/components/nav.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fonts/bootstrap-icons.css') }}">

	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

</head>
<body>

	<div class="wrapper-contain">

		{{ partial('nav.header') }}
		{{ partial('nav.topnav') }}
		{{ partial('nav.navbar') }}



		{{ partial('footer') }}
	</div>

</body>
</html>
