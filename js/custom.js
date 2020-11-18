 


+function(t){ 


	onload_styles();
 	 
 	$('[data-is-inview]').is_inview(); 

	section_slider_init();

	modals_init();

}(jQuery); 

function onload_styles(){ 

	$('[data-onload-style]').each(function(){ 
		var style = $(this).attr('data-onload-style');
		$(this).attr('style', style); 
	});

}

function modals_init(){
	$('.modal').on('show.bs.modal', function (e) { 
		var modal = $( this );  
		var relatedTarget = $(e.relatedTarget); 
		
		if(relatedTarget.attr('data-modal-iframe-src')){
			var mapIframe = relatedTarget.attr('data-modal-iframe-src'); 
			modal.find('iframe').attr('src',mapIframe); 
		}
		if(relatedTarget.attr('data-modal-video-mp4-src')){

			if(relatedTarget.attr('data-modal-video-portrait')){

				var portrait = relatedTarget.attr('data-modal-video-portrait');
				modal.find('.image-cover').css('background-image','url('+portrait+')');
			}

			var src_mp4 = relatedTarget.attr('data-modal-video-mp4-src');
			modal.find('video')[0].src = src_mp4;
			modal.find('video')[0].currentTime = 0;
			modal.find('video')[0].play();
		}

		if(relatedTarget.attr('data-modal-title')){
			var title = relatedTarget.attr('data-modal-title'); 
			modal.find('.modal-title').html(title); 
		}
	});

	$('.modal').on('hide.bs.modal', function (e) { 
		var modal = $( this );  
		

		modal.find('iframe').attr('src',''); 
		modal.find('image-cover').css('background-image','');
		if(modal.find('video').length>0){
			modal.find('video')[0].src = '';
		}
		modal.find('.modal-title').html(''); 
	});
}

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

	//$('html, body').scrollTop(10);
	//bs_scroll_to_offset(0);  
	$('html, body').scrollTop(0);

	$('[data-toggle="nav-affix"]').navAffix();

	$('nav.navbar-expand-aside, nav.navbar-expand-3d').expandAside();
	
	$('[data-is-inview]').is_inview();

	//$('.slick-slider').slick('reInit'); 
	$('.slick-slider').slick('unslick');
	$('[data-slick]').make_slick();

	modals_init();
	section_slider_init();

	$(window).trigger('resize'); 
}

function swup_theme_pageView(){

	
	//alert("swup_theme_pageView");

}