{{ partial('cards.popup-cards') }}
{{ partial('nav.back-totop') }}

<nav class="navibar">
  <div class="container w-90">
    <a href="" class="typos05x-brand text-black hd-title">
    	<span>equitic</span>
    </a>
    <div class="navi-items">
    	<a
    		href="{{ route('/') }}"
    		class="navi-link <?=  $this->path() == '' ? 'active' : '' ?>"
    	>
    		Inicio
    	</a>
    	<a
    		href="{{ route('produtos') }}"
    		class="navi-link <?=  $this->path() == 'produtos' ? 'active' : '' ?>"
    	>
    		Produtos
    	</a>
    	<a href="" class="navi-link">Servicos</a>
    	<a href="" class="navi-link">Contactos</a>
    	<a
    		href=""
    		class="navi-link ml-auto"
    	>
    		Checkout
    	</a>
    	<a
    		href="{{ route('carrinho') }}"
    		class="navi-link <?=  $this->path() == 'carrinho' ? 'active' : '' ?>"
    	>
    		<span class="bi-cart4"></span>
    	</a>
    	<a href="" class="navi-link has-dropdown dropdown-toggler">
    		<span class="bi-person-fill"></span>
    		<div class="link-dropdown">
    			<a href="" class="dropdown-item"> Perfil </a>
    			<a href="" class="dropdown-item"> Lista desejada </a>
    			<a href="" class="dropdown-item"> Minhas compras </a>

    			<span class="dropdown-separator"></span>

    			<a href="{{ route('carrinho') }}" class="dropdown-item"> Finalizar compras </a>

    			<span class="dropdown-separator"></span>

    			<a href="" class="dropdown-item"> Definições da Conta </a>
    			<a href="" class="dropdown-item"> Terminar sessão </a>
    		</div>
    	</a>
    </div>
  </div>
</nav>

<script>
		$(document).click(function (e) {
		  if (e.target.classList.contains('dropdown-toggler')) {
				e.preventDefault();
		    $('.link-dropdown').toggleClass('active'); return;
		  }
		  $('.link-dropdown').removeClass('active');
		});
	$(document).ready(function() {

	});
</script>
