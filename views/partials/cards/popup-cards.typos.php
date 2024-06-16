<div class="popup-cards py-4 py-lg-0">
	<div class="container">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="popup-contain">
					<div class="popup-header d-flex jc-end">
						<button type="button" class="popup-close"> <span class="bi-x"></span> </button>
					</div>
					<div class="popup-body px-4 mt-4">
						<div class="popup-img d-flex ai-center jc-center mb-4">
							<img src="{{ asset('img/carregador.png') }}" alt="" class="article-img md">
						</div>
						<span class="article-name">Carregador a cabo</span>
						<div class="ratings">
							<small class="bi-star-fill"></small>
							<small class="bi-star-fill"></small>
							<small class="bi-star-fill"></small>
							<small class="bi-star-fill"></small>
							<small class="bi-star"></small>
						</div>
						<span class="article-price">Kz 2.500,00</span>
						<p class="mt-2 mb-4 text-muted">
							<small>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit, veniam quo aperiam cumque quod minus.</small>
						</p>
						<a href="" class="show-btn">+ ao carrinho</a>
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
