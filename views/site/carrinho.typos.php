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
	<link rel="stylesheet" href="{{ asset('css/components/cart.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fonts/bootstrap-icons.css') }}">

	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

</head>
<body>

	<div class="wrapper-contain">
		{{ partial('nav.navbar') }}
		<div class="navigator">
			<div class="container w-90">
				<div class="row">
					<div class="col-lg-4">
						<span class="hd-title">Carrinho de compras</span>
					</div>
					<div class="col-lg-8 d-flex jc-end ai-center">
						<small> <a href="{{ route('/') }}">Home</a> </small>
						<small class="d-block mx-1"> / </small>
						<small class="text-muted"> Carrinho </small>
					</div>
				</div>
			</div>
		</div>


		<div class="section-card mt-5">
			<div class="section-card-contain">
				<div class="container w-90">
					<div class="row">
						<div class="col-lg-8">
							<div class="carttable">
								<div class="carttable-contain">
									<div class="carttable-header">
										<span class="th">Produto</span>
										<span class="th">Quantidade</span>
										<span class="th">Total</span>
										<span class="th"></span>
									</div>
									<div class="carttable-body">
										<?php for($i = 0; $i < 3; $i++): ?>
											<div class="carttable-item">
												<div class="td">
													<img src="{{ asset('img/camera.png') }}" alt="">
													<div class="article-info">
														<small class="article-name">Chipset de computador</small>
														<small class="article-price">Kz 12.000,00</small>
													</div>
												</div>
												<div class="td">
													<div class="mymumber">
														<span class="bi-chevron-left"></span>
														<input type="text" value="1" readonly>
														<span class="bi-chevron-right"></span>
													</div>
												</div>
												<div class="td d-flex ai-center jc-center">
													<small class="article-price">Kz 12.000,00</small>
												</div>
												<div class="td">
													<a href="" class="carttable-action">
														<span class="bi-x"></span>
													</a>
												</div>
											</div>
										<?php endfor; ?>
									</div>
								</div>
							</div>
							<div class="row no-spacing mt-5 jc-between">
								<a href="" class="customized-btn w-100 w-sm-50 w-md-30 no-bg">Continuar compras</a>
								<a href="" class="customized-btn w-100 mt-2 mt-sm-0 w-sm-50 w-md-30 bg-black"> <small class="bi-arrow-clockwise"></small> Actualizar carrinho</a>
							</div>


						</div>

						<div class="col-lg-4 mt-5 mt-lg-0">
							<span>Código de Desconto</span>
							<form action="" class="row mt-3">
								<div class="col-12">
									<div class="input-group">
										<input type="text" class="customized-input" placeholder="Insira o código de 7 digitos">
										<button type="submit" class="customized-btn">aplicar</button>
									</div>
								</div>
							</form>
							<div class="cartinfo mt-5">
								<span>TOTAL CARRINHO</span>
								<div class="d-flex mt-4 ai-center jc-between">
									<small>Subtotal</small>
									<span>Kz 10.000,00</span>
								</div>
								<div class="d-flex mt-3 ai-center jc-between">
									<small>Total</small>
									<span>Kz 10.000,00</span>
								</div>
								<a href="" class="d-flex ai-center jc-center mt-5 mb-3 w-90 mx-auto text-center text-white customized-btn">Fazer checkout</a>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>









		<span class="d-flex my-5"></span>
		<span class="d-flex my-5"></span>





		{{ partial('footer') }}
	</div>

</body>
</html>

<script src="{{ asset('js/customized.js') }}"></script>
