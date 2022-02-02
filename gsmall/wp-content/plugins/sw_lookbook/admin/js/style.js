(function($) {	
    "use strict";
    // SW LOOKBOOK
	$(document).ready(function(){
	  $(".nav-tabs a").click(function(){
		$(this).tab('show');
	  });	
	  if($('#show_lookbook_name').val() != "") {
	     InitHotspotBtn();
	  }	   
	});

    jQuery(document).ready(function($) {
        $('.swlookbook_image_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  ,
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.swlookbook_image').attr('src', attachment.url);
                $('.swlookbook_image_url').val(attachment.url);
				$('.swlookbook_image').attr('width',attachment.width);
				$('.swlookbook_image').attr('height',attachment.height);				
				InitHotspotBtn();				
            })
            .open();
        });
    });


	function InitHotspotBtn() {
		if ($("img#swlookbook_image").attr("id")) {	
		
			if($("#pins").val() != '') {
				var pins = JSON.parse($("#pins").val());
				var annotObj = $("img#swlookbook_image").annotateImage({          				    
					editable: true,
					useAjax: false,
					notes: pins,
					input_field_id: "pins"                                          
				});
			} else {
				var annotObj = $("img#swlookbook_image").annotateImage({            				    
					editable: true,
					useAjax: false,
					input_field_id: "pins"                                          
				});
			}
			return annotObj;
		}else{
			return false;
		}
	}	

})(jQuery);