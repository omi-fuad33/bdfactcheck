<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Anannya
 */

get_header();
?>

<div class="container">
    <div class="d_single">
      <div class="row">
        <div class="d-none d-md-block col-md-2 col-lg-2">
          <?php $category = get_the_category(); ?>
            <p class="d_single_cat"> <?php $firstCategory = $category[0]->cat_name; echo $firstCategory;?></p>
                <p class="d_single_date"><?php echo get_the_date(); ?> , <?php echo get_the_time(); ?></p>
                <p class="d_last-modified">Last modified: <?php echo get_the_modified_date(); ?> , <?php echo get_the_modified_time(); ?></p>
                <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
        </div>
        <div class="col-sm-12 col-md-10 col-lg-7">
          <?php
              // Start the loop.
              while ( have_posts() ) : the_post();
                  $category_id = the_category_id(false);

                  if ($category_id === 14 or $category_id === 15)
                  {
                      get_template_part( 'template-parts/content-gallery', get_post_type() );
                  }

                  else {
                      get_template_part( 'template-parts/content', get_post_type() );
                  }
                    endwhile;
      ?>
        </div>
            <div class="col-lg-3 col-md-3">
                <div class="d_same_cat_news_parent">
                    <div class="d_same_cat_news">
                        <p class="d_recent_heading">এই বিভাগের অন্যান্য</p>
                        <hr class="style1">
                        <?php

                        $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
                        if( $related ) foreach( $related as $post ) {
                            setup_postdata($post); ?>

                        <div><a class="d_cat_heading_text" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
                        <hr class="d_same_cat_news_hr">

                        <?php }
                        wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
