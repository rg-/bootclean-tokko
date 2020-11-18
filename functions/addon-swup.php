<?php

/*

	Disable option page for this addon

*/

add_filter('wpbc/filter/swup/option_page', function(){
	return false;
},10,1);

/*

	Disable default css used 
	See theme styles

*/
add_filter('wpbc/filter/swup/usecss', function(){
	return false;
},10,1);

add_filter('wpbc/filter/swup/SwupFormsPlugin',function(){
	return true;
},10,1);

add_filter('wpbc/filter/swup/containers', function($containers){ 

	$containers = '#main_navbar_container, #main-content-wrap, #ui-tokko-modals';
	return $containers;
},20,1 );

add_filter('wpbc/filter/swup/plugins/mainElement', function($mainElement){ 
	$mainElement = '#main-content-wrap'; 
	return $mainElement;
},20,1 );


add_action('wpbc/action/swup/clickLink', function(){

?>
swup_theme_clickLink();
<?php

},10); 

add_action('wpbc/action/swup/pageView', function(){

?>
swup_theme_pageView();
<?php

},10); 

add_action('wpbc/action/swup/contentReplaced', function(){ 
?> 
swup_theme_contentReplaced();
<?php

},10);

/*

	Disable acf form on front end if page use pjax

	Reason: form is not re-loaded the right way, tabs, conditionals... not working.

*/
add_filter('wpbc/filter/acf/enable_acf_form', function(){ 
	if( WPBC_is_swup_enabled() ){
		return false;
	}

},10,1);


/*
	
	Move Main PageHeader inside #main-content-wrap

*/
add_action('wpbc/layout/start',function(){

	remove_action('wpbc/layout/start','WPBC_layout_struture__main_pageheader',20);
	add_action('wpbc/layout/start', 'WPBC_layout_struture__main_pageheader',31); 

},0);