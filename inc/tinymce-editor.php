<?php

// Customize the Wysiwyg blockformats
add_filter( 'tiny_mce_before_init', function( $settings ){
	$settings['block_formats'] = 'Paragraph=p;Heading=h2;Subheading=h3';
	return $settings;
} );


// Add TinyMCE Editor Stylesheet
function wpdocs_theme_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

?>
