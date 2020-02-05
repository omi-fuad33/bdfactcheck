<div class="d_archive">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-5 d_arc_img">
      <?php the_post_thumbnail(); ?>
    </div>
    <div class="col-12 col-md-6 col-lg-7 d_arc_news">
        <h3 class="d_arc_heading"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        <div class="d-md-none d-lg-block">
          <?php echo the_excerpt(); ?>
        </div>
        <p class="d_post_date"> <?php the_time(get_option('date_format')); ?> </p>
    </div>
  </div>
</div>
