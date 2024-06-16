
<div class="col-lg-4 common-card">
	<div class="common-card-header">
		<!--<small class="article-type">A VENDA</small> -->
		<img src="{{ asset('img/carrecabo.png') }}" alt="" class="article-img">
		<div class="card-options">
			<a href="" class="option-btn"> <span class="bi-heart"></span> </a>
			<a href="" class="option-btn"> <span class="bi-arrow-left-right"></span> </a>
			<a href="" class="option-btn" name="trig-cardPopup"> <span class="bi-eye-fill"></span> </a>
		</div>
	</div>
	<div class="common-card-contain">
		<a href="" class="article-btn after">+ ao carrinho</a>
		<span class="article-name">Fêmea de carregador</span>
		<div class="ratings">
			<small class="bi-star-fill"></small>
			<small class="bi-star-fill"></small>
			<small class="bi-star-fill"></small>
			<small class="bi-star-fill"></small>
			<small class="bi-star"></small>
		</div>
		<span class="article-price">Kz 2.500,00</span>
	</div>
</div>


<script>
	$(document).ready(function() {
		$('[name="trig-cardPopup"]').click((e) => {
			e.preventDefault();
			$('.popup-cards').addClass('active');
			$('.popup-contain').addClass('active');
			$('body').css('overflow', 'hidden');
		});
	});
</script>
