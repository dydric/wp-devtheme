<?php if( have_rows('row_settings') ): ?>
  <?php while( have_rows('row_settings') ): the_row(); ?>
    <?php if( have_rows('settings') ): ?>
      <?php while( have_rows('settings') ): the_row();
        $backgroundClass = 'row__bg--' . get_sub_field('background');
        $alignClass = 'row__align--' . get_sub_field('align');
        $spacingClass = 'row__spacing--' . get_sub_field('align');
      ?>
      <?php endwhile; ?>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>

<div class="row row--default <?php echo $backgroundClass . ' ' . $alignClass . ' ' . $spacingClass ?>">
  <div class="row__content">
    <?php // echo $backgroundClass . ' ' . $alignClass . ' ' . $spacingClass ?>
    <?php
      if(get_sub_field('title')) {
        echo '<h2>' . get_sub_field('title') . '</h2>';
      }

      if(get_sub_field('content')) {
        echo get_sub_field('content');
      }
    ?>
  </div>
</div>
