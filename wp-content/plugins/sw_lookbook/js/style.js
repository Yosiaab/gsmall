(function($) {	
    "use strict";
    // SW LOOKBOOK
    $(document).ready(function($) {
		
		var showpin =$('.sw-lookbook-slider').data('show-pin');
		
		if($('.pin__type').length){
			
			if(showpin == 1) {
				$('.sw-lookbook-container .pin__type').click(function(){
					
					$('.sw-lookbook-container .pin__type').removeClass('pin__opened');
					$(this).addClass('pin__opened');
					
				});				
			} else {

				$('.sw-lookbook-container .pin__type').mouseenter(function () {
					  $('.sw-lookbook-container .pin__type').removeClass('pin__opened');
						$(this).toggleClass('pin__opened');
						$('.sw-lookbook-container .pin__image').addClass('pm-mask');
					 });

				 $('.sw-lookbook-container .pin__type').mouseleave(function () {
					   $('.sw-lookbook-container .pin__type').removeClass('pin__opened');
					   $('.sw-lookbook-container .pin__image').removeClass('pm-mask');
					}
				 ).mouseleave();
			}

			
			$('.sw-lookbook-image').click(function(){
				$('.sw-lookbook-container .pin__type').removeClass('pin__opened');
			});
			$('.sw-lookbook-container .pin__type .pin__popup .close-popup').click(function(e){
				e.stopPropagation();
				$('.sw-lookbook-container .pin__type').removeClass('pin__opened');
			});
		}
    })
})(jQuery);