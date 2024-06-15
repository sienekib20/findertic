<link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/login.css') }}">

<footer class="footer-4all">
  <div class="container w-80">

    <div class="row">
      <div class="col-lg-4">
        <div class="footer-header">
          <div class="logo">
            <span class="bi-hdd-network text-white"></span>
            <h5 class="hd-title text-white ml-1">buseq tic</h5>
          </div>
          <span class="text-muted d-block mt-3 line-height-1">Explore, encontre, e obtenha o equipamento tecnologico adequado.</span>
        </div>
        <div class="footer-contain mt-4 d-flex ai-center">
          <a href="https://www.facebook.com/siene" target="_blank" class="footer-social">
            <span class="bi-facebook"></span>
          </a>
          <a href="mailto:sienekib@gmail.com" class="footer-social" target="_blank"> G </a>
          <a href="https://instagram.com/gomes.mucanza" class="footer-social" target="_blank"> in </a>
          <a href="https://wa.me/244949901787" target="_blank" class="footer-social">
            <span class="bi-whatsapp"></span>
          </a>
        </div>

        <div class="footer-contain mt-5 d-flex flex-column text-muted">
          <span class="hd-title text-white d-block mb-4">Localização</span>
          <span class="">
            <span class="bi-geo"></span>
            Av. Dr. António Agostinho Neto | Kinanga, Ingombotas. Luanda - Angola
          </span>
        </div>
      </div>

      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="footer-header">
          <span class="hd-title text-white text-uppercase">Ofertas diárias & descontos</span>
          <small class="text-muted d-block line-height-1 mt-3">Mantenha-se actualizado sobre os nossos produtos e receba
            um desconto nas suas compras.</small>
          <form action="" method="post" class="mt-5">
            <div class="customized-group w-100 d-flex ai-center">
              <div class="input-group my-0">
                <input type="email" class="customized-input" placeholder="Insira o seu email" required
                  style="border-radius: 0.1rem;">
              </div>
              <button type="submit" class="customized-btn my-0 w-20" id="customized-btn-all"
                style="border-radius: 0.1rem;">
                <span>&GreaterGreater;</span>
              </button>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="footer-header">
          <span class="hd-title text-white text-uppercase d-flex jc-start jc-xl-end">Servicos</span>
          <small class="text-muted d-block line-height-1 mt-3 d-flex jc-start jc-xl-end">Temos muito pra ti.</small>
          <div class="footer-contain mt-4">
            <a href="" class="d-flex ai-center jc-start jc-xl-end text-muted"> <small>Manutencao & reparacao de impressoras</small> </a>
            <a href="" class="d-flex ai-center jc-start jc-xl-end text-muted"> <small>Desenvolvimento de Software</small> </a>
            <a href="" class="d-flex ai-center jc-start jc-xl-end text-muted"> <small>Montagem de Rede</small> </a>
            <a href="" class="d-flex ai-center jc-start jc-xl-end text-muted"> <small>Formacao Tecnico & Profissional</small> </a>
            <a href="" class="d-flex ai-center jc-start jc-xl-end text-muted"> <small>Instalacao de Aplicativos</small> </a>
            <a href="" class="d-flex ai-center jc-start jc-xl-end text-muted"> <small>Explora mais</small> </a>
          </div>
        </div>
      </div>
    </div>


    <div class="section-card my-2"></div>

    <div class="row">
      <div class="col-12">
        <div class="h-separator" style="background-color: rgba(255, 255, 255, 0.3);"></div>
      </div>
    </div>

    <div class="section-card my-2"></div>

    <div class="row">
      <div class="col-lg-8">
        <span class="text-muted">
          &copy;
          <script>
            document.write(new Date().getFullYear());
          </script>
          Todos os direitos reservados | Patenteado por: <a href="@" class="text-underline"
            target="_blank" style="color: #6747C7">itc's, lda</a>
          <br> <div class="mt-4 mt-lg-0"></div> Design feito com &hearts; por:
          <a href="tel:+244949901787" class="text-white text-underline">Sienekib</a>
        </span>
      </div>
      <div class="col-lg-4 my-4 my-lg-0">
        <small>
          <img src="{{ asset('img/payment.png') }}" alt="">
        </small>
      </div>
    </div>
  </div>
</footer>
