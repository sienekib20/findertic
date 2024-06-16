<button type="button" class="back-to">
	<span class="bi-chevron-up"></span>
</button>

<script>
	$(document).ready(function () {
	  $(window).scroll(function () {
	    $(this).scrollTop() > 460
	      ? $('.back-to').addClass('active')
	      : $('.back-to').removeClass('active');
	  });

	  //
	  $('.back-to').click(function () {
	    $('html, body').animate({
	      scrollTop: 0
	    }, 1000);
	  })

	});
</script>
