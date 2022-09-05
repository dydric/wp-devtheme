<?php

// remove gravity required fields
add_filter( 'gform_required_legend', '__return_empty_string' );
