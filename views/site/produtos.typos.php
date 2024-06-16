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
		{{ partial('nav.navbar') }}
		<div class="navigator">
			<div class="container w-80">
				<div class="row">
					<div class="col-lg-2">
						<span class="hd-title">Produtos</span>
					</div>
					<div class="col-lg-10 d-flex jc-end ai-center">
						<small> <a href="{{ route('/') }}">Home</a> </small>
						<small class="d-block mx-1"> / </small>
						<small class="text-muted"> Produtos </small>
					</div>
				</div>
			</div>
		</div>


		{{ partial('cards.popup-products') }}

		<div class="section-card">
			<div class="section-card-contain">
				<div class="container w-80">
					<div class="row">
						<div class="col-md-1">
							<button class="customized-btn"> <span class="bi-list"></span> </button>
						</div>
						<div class="col-md-11 z-index-ultimate">
							<form action="" class="w-100 row">
								<div class="input-group">
									<input type="text" class="customized-input" placeholder="Pesquisar artigo...">
									<!--<a href="" class="search-call"> <small class="bi-search"></small> </a> -->
									<div class="search-options">
										<div class="myselect">
											<div class="myselect-header">
												<span class="selected-option">Categorias</span>
												<span class="bi-chevron-down"></span>
											</div>
											<div class="myselect-options">
												<small class="myselect-option">a minha option 1</small>
												<small class="myselect-option">a minha option 1</small>
												<small class="myselect-option">a minha option 1</small>
											</div>
										</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>



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

		<div class="section-card">
			<div class="section-card-header">
				<div class="container">
					<div class="row">
						<div class="col-12 text-center">
							<span class="hd-title">Artigos Novos</span>
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

		<div class="section-card">
			<div class="section-card-header">
				<div class="container">
					<div class="row">
						<div class="col-12 text-center">
							<span class="hd-title">Artigos Ranqueados</span>
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
		<span class="d-flex my-5"></span>
		<span class="d-flex my-5"></span>





		{{ partial('footer') }}
	</div>

</body>
</html>

<script src="{{ asset('js/customized.js') }}"></script>
