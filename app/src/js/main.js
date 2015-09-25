;
(function ($) {
    $(function () {

    		/*PREVENT DEFAULT ON SOLD BOOKS LINKS*/
    		$('.sold').on('click', function(event) {
    			event.preventDefault();
    			/*Thats all =))*/
    		});			

			if($('.youtube').length) {
				$('.youtube').fancybox({
					fitToView	: true,
					width		: '80%',
					height		: '80%',
					autoSize	: true,
					closeClick	: false,
					openEffect	: 'none',
                    closeEffect	: 'fade',
                    helpers: {
                        overlay: {
                            locked: false
                        }
                    }
				});
			};

            if($('.fancybox').length) {
                $('.fancybox').fancybox({
                    helpers: {
                        overlay: {
                            locked: false
                        }
                    }
                });
            };

            /*Vertical align gallery*/
            /*if($('.gallery').length) {
                var 
                    gallery = $('.gallery'),
                    primary = $('.site-content').find('#primary'),
                    primaryHeight  = primary.height(),
                    secondary = $('.site-content').find('#secondary'),
                    secondaryHeight  = parseInt(secondary.css('height'));

                console.log(primaryHeight);
                console.log(secondaryHeight);
                    primary.css('height', secondaryHeight);
            }*/

    });

}(jQuery));

