<?php

add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
  // Uncomment to view format of $toolbars

  // echo '< pre >';
  // 	print_r($toolbars);
  // echo '< /pre >';
  // die;

  // Add a new toolbar called "Very Simple"
  // - this toolbar has only 1 row of buttons
  $toolbars['Very Simple' ] = array();
  $toolbars['Very Simple' ][1] = array('formatselect', 'bold' , 'italic' , 'underline', 'link', 'bullist', 'numlist' );

  // Edit the "Full" toolbar and remove 'code'
  // - delete from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
  if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
  {
    unset( $toolbars['Full' ][2][$key] );
  }

  // remove the 'Basic' toolbar completely
  unset( $toolbars['Basic' ] );

  // return $toolbars - IMPORTANT!
  return $toolbars;
}


// Customize the Wysiwyg blockformats
add_filter( 'tiny_mce_before_init', function( $settings ){
	$settings['block_formats'] = 'Paragraph=p;Heading=h2;Subheading=h3';
	return $settings;
} );

?>
