<?php

// SPEED UP ACF
// https://www.advancedcustomfields.com/blog/acf-pro-5-5-13-update/
add_filter('acf/settings/remove_wp_meta_box', '__return_true');

// ADD ACF OPTION PAGES
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' 	=> 'Thema Settings',
    'menu_title'	=> 'Thema settings',
    'menu_slug' 	=> 'theme-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> 'algemeen'
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Theme global settings',
    'menu_title'	=> 'Algemeen',
    'parent_slug'	=> 'theme-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Theme Header Settings',
    'menu_title'	=> 'Header',
    'parent_slug'	=> 'theme-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Theme Footer Settings',
    'menu_title'	=> 'Footer',
    'parent_slug'	=> 'theme-settings',
  ));
}

// MOVE OPTION PAGES UP (UNDER DASHBOARD)
function custom_menu_order( $menu_ord ) {

  if (!$menu_ord) return true;

  // vars
  $menu = 'acf-options-algemeen';

  // remove from current menu
  $menu_ord = array_diff($menu_ord, array( $menu ));

  // append after index.php [0]
  array_splice( $menu_ord, 1, 0, array( $menu ) );

  // Uncomment to view correct slug
  // echo '<pre>';
  // print_r( $menu_ord );
  // echo '</pre>';
  // die;

  // return
  return $menu_ord;
}

add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');

// ADD SELECT WITH TOOLBAR OPTIONS
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars ){
  // Uncomment to view format of $toolbars

  // echo '< pre >';
  // 	print_r($toolbars);
  // echo '< /pre >';
  // die;

  // Add a new toolbar called "Very Simple"
  // - this toolbar has only 1 row of buttons
  $toolbars['Very Simple' ] = array();
  $toolbars['Very Simple' ][1] = array('formatselect', 'bold' , 'italic' , 'underline', 'link', 'bullist', 'numlist', 'alignleft', 'aligncenter', 'alignright' );

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

?>
