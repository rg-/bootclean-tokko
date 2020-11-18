+function(t){ 
 	 
 	$('[data-is-inview]').is_inview(); 

	section_slider_init();

}(jQuery); 

function section_slider_init(){
	$('[data-has-pager="true"]').on('afterChange', function (e, slick, currentSlide) { 
		var val = currentSlide+1;
		if(val<10){
			val = '0'+val;
		} 
		$('[data-pager="#'+ $(this).attr('id') +'"]').find('.current').html(val);
	});
}


function swup_theme_clickLink(){

	

}

function swup_theme_contentReplaced(){

	//bs_scroll_to_offset(0); 

	$('html, body').scrollTop(0);

	$('[data-toggle="nav-affix"]').navAffix();
	
	$('[data-is-inview]').is_inview();

	$('.slick-slider').slick('reInit'); 
	
	section_slider_init();

	$(window).trigger('resize'); 
}

function swup_theme_pageView(){

	
	//alert("swup_theme_pageView");

}