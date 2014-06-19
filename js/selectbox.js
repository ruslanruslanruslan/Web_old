(function($){
	$(document).ready( function() {
		$("SELECT")
			.each( function(){
				var first_opt = $(this).children().eq(0),
					first_opt_val = first_opt.text(),
					custom_empty_value = '-------';

				first_opt_val == ''? first_opt.text( custom_empty_value ) :'';
			})
			.selectbox();

		$('.sbOptions').mouseleave(function() {
			$(this).hide();
		});
	});
})(jQuery);