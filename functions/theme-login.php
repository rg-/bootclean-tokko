<?php

// Disable option page for this addon
add_filter('wpbc/filter/custom_login/options_page/enable','__return_false',10,1);

// Enable adddon
add_filter('wpbc/filter/custom_login/enable','__return_true',10,1);

// Set arguments by default
add_filter('wpbc/filter/custom_login/default_args', function($args){
	/* EX
	$args['login_brand'] = array(
		'background-image' => get_stylesheet_directory_uri().'/images/theme/YOURLOGO.jpg',
		'background-size' => '120px auto',
		'width' => '120px',
		'height' => '53px',
	);
	*/
	return $args;

},10,1); 