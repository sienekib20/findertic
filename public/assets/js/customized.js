"use-strict";

(function($){
	if (!$) {
		console.error("Carregue o `jquery` no seu projeto");
		return;
	}

	const myselect_header = $('.myselect-header');
		myselect_header.click((e) => {
			e.preventDefault();
			e.target.classList.toggle('active');
			$('.myselect-options').toggleClass('active');
		});
	$('.myselect-option').click(function(e) {
		e.preventDefault();
		$('.myselect-option').removeClass('active');
		$(this).addClass('active');
		$('.myselect-header span:nth-child(1)').text('');
		$('.myselect-header span:nth-child(1)').text($(this).text());
		$(this).parent().removeClass('active');
		$(this).parent().prev().removeClass('active');
	});

})(jQuery);
