<?php

/*

	Show helpers on fields on admin, that is
	front end function to get the field like 

*/

add_filter('wpbc/filter/theme_settigs/show_helpers', '__return_true');


/*

	Remove tabs and fields from Theme Settings Groups

	Defaults are:

			'fields-general',
			'fields-header',
			'fields-footer',
			'fields-typography',
			'fields-custom-code',

*/ 

add_filter('wpbc/filter/theme_settings/file_path', function($file_path, $key){

	$excluded_groups = array(
		// 'fields-header',
		// 'fields-typography'
	);

	if( in_array($key, $excluded_groups) ){
		$file_path = '';
	}

	return $file_path;

},10,2);


/*

	Filter arguments for option page and default group

*/

add_filter('wpbc/filter/theme_settings/args',function($args){
	$args['options_page']['page_title'] = 'CHILD settings';
	$args['options_page']['menu_title'] = 'CHILD settings';
	$args['options_page']['icon_url'] = '';
	return $args;
},11,1);