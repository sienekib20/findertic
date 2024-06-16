<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>{{ title }}</title>

	<link rel="stylesheet" href="{{ asset('css/alquimist.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fonts/all.css') }}">
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('css/components/popup.css') }}">
	<link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
	<link rel="stylesheet" href="{{ asset('css/components/nav.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fonts/bootstrap-icons.css') }}">

	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

</head>
<body>

	<div class="wrapper-contain">

		{{ partial('nav.header') }}
		{{ partial('nav.navbar') }}

		<span class="d-flex my-5"></span>

		<div class="section-card">
			<div class="section-card-header">
				<div class="container">
					<div class="row">
						<div class="col-12 text-center">
							<span class="hd-title">Artigos Communs</span>
						</div>
					</div>
				</div>
			</div>

			<div class="section-card-contain">
				<div class="container w-80">
					<div class="row cards-gap">
						<?php for ($i = 1; $i < 4; $i++): ?>
							{{ partial('cards.common-cards') }}
						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>

		<span class="d-flex my-5"></span>

		<div class="section-card">
			<div class="section-card-header">
				<div class="container w-80">
					<div class="row">
						<div class="col-12">
							<div class="toolbar d-flex">
								<a href="" class="toolbar-btn active">Todos</a>
								<a href="" class="toolbar-btn">Novidades</a>
								<a href="" class="toolbar-btn">Ranqueados</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="section-card-contain">
				<div class="container w-80">
					<div class="row cards-gap">
						<?php for ($i = 1; $i < 7; $i++): ?>
							{{ partial('cards.common-cards') }}
						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>

		<span class="d-flex my-5"></span>



		<span class="d-flex my-5"></span>
		<span class="d-flex my-5"></span>
		<span class="d-flex my-5"></span>





		{{ partial('footer') }}
	</div>

</body>
</html>
