<?php

// Disable Gutenburg Editor
// More info: https://digwp.com/2018/12/enable-gutenberg-block-editor/

  // WP < 5.0 beta
  // add_filter('gutenberg_can_edit_post', '__return_false', 5);

  // WP >= 5.0
  // add_filter('use_block_editor_for_post', '__return_false', 5);


// DISABLE PER POST-TYPE
// page, post, ed

  function mgc_gutenberg_filter( $use_block_editor, $post_type ) {
    if ( 'page' === $post_type)  {
      return false;
    }
    return $use_block_editor;
  }
  add_filter( 'use_block_editor_for_post_type', 'mgc_gutenberg_filter', 10, 2 );

