<?php

/* Adding custom google fonts */

add_filter('WPBC_enqueue_google_fonts', 'wpbc_child_enqueue_google_fonts', 10, 1);

function wpbc_child_enqueue_google_fonts($fonts){ 

	$fonts = array(
		array(
			'base' => 'Montserrat', // css class base name .font-[base]{}
			'href' => 'https://fonts.googleapis.com/css?family=Montserrat:wght@300&display=swap',
			'font-family' => "'Montserrat', serif;",
			'primary' => true // will be "body" font on inline style
		), 
	);

	return $fonts; 

}



/*

	- Custom font used, see https://transfonter.org/ to transform any font file into web font-family one

	- Use priority 0 to put code on very top position (load first of any other css used)
	- Notice the "body.using-theme-fonts" definition
	- Add body class
	- You could include here any kind of code in fact, but keep for fonts.

 */

// add_filter('wpbc/body/class', 'wpbc_child_body_class__fonts',		0,	1);
// add_action('wp_head', 				'wpbc_child_wp_head__fonts', 			0); 

function wpbc_child_body_class__fonts($body_class){
	$body_class .= ' using-theme-fonts';
	return $body_class;
}

function wpbc_child_wp_head__fonts() {
	$theme_uri = CHILD_THEME_URI.'/fonts/theme/';
 	echo "<style>

 		@font-face {
		    font-family: 'Arimo';
		    src: url('".$theme_uri."gilroy-extrabold.eot');
		    src: url('".$theme_uri."gilroy-extrabold.eot?#iefix') format('embedded-opentype'),
		         url('".$theme_uri."gilroy-extrabold.woff2') format('woff2'),
		         url('".$theme_uri."gilroy-extrabold.woff') format('woff'),
		         url('".$theme_uri."gilroy-extrabold.ttf') format('truetype'),
		         url('".$theme_uri."gilroy-extrabold.svg#gilroyeb') format('svg');
		    font-weight: normal;
		    font-style: normal;
		}

		body.using-theme-fonts{
			font-family: 'Arimo', helvetica, arial, sans-serif; 
		}

		</style>";
}  

/* Embed Font Awesome */

// add_filter('BC_enqueue_scripts__fonts', 'wpbc_child_enqueue_custom_font_awesome'); 

function wpbc_child_enqueue_custom_font_awesome($fonts){ 
	$fonts['fontawesome-all'] = array( 
		'src'=>'css/fontawesome/all.min.css'
	); 
	return $fonts; 
}