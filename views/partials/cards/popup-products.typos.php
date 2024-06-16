<div class="popup-cards py-4 py-lg-0" id="">
	<div class="container">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="popup-contain">
					<div class="popup-header d-flex ai-center jc-between pl-2">
						<span class="">Filtrar resultados</span>
						<button type="button" class="popup-close"> <span class="bi-x"></span> </button>
					</div>
					<div class="popup-body px-4 mt-4">
						<div class="filter-item">
							<span class="filter-title">Classificados</span>
							<div class="filters mt-2">
								<?php for ($i = 0; $i < 4; $i++): ?>
									<label for="f<?= $i ?>" class="d-flex ai-center">
										<input type="checkbox" id="f<?= $i ?>" class="customized-check mr-2">
										<small>Mais classificados</small>
									</label>
								<?php endfor; ?>
							</div>
						</div>
						<div class="filter-item">
							<span class="filter-title">Precos</span>
							<div class="filters mt-2">
								<?php for ($i = 5; $i < 9; $i++): ?>
									<label for="f<?= $i ?>" class="d-flex ai-center">
										<input type="checkbox" id="f<?= $i ?>" class="customized-check mr-2">
										<small>Entre 1.000,00 - 5.000,00 (Kz)</small>
									</label>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		$('.popup-cards').click((e) => {
			if (e.target.classList.contains('popup-cards')) {
				rmActiveClasse()
			}
		});
		$('.popup-close').click((e) => rmActiveClasse());
	});

	function rmActiveClasse() {
		$('body').css('overflow', 'auto');
		$('.popup-cards').removeClass('active');
		$('.popup-contain').removeClass('active');
	}
</script>
