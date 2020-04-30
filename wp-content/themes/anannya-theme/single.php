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
            <p class="d_single_cat">
                <?php
  $categories = get_the_category();
  $separator = ' ';
  $output = '';
  if($categories){
      foreach($categories as $category) {
          $output .= '<a href="'.get_category_link( $category ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
          break;
      }
  echo trim($output, $separator);
  }
  ?>
</p>
                <!-- <p class="d_single_date">Published: <?php echo get_the_date(); ?>, <?php echo get_the_time(); ?></p>
                <p class="d_last-modified">Updated: <?php echo get_the_modified_date(); ?>, <?php echo get_the_modified_time(); ?></p> -->
                <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
        </div>
        <div class="col-sm-12 col-md-10 col-lg-7">
          <?php
              // Start the loop.
              while ( have_posts() ) : the_post();
                  $category_id = the_category_id(false);
                      get_template_part( 'template-parts/content', get_post_type() );
                      // If comments are open or we have at least one comment, load up the comment template.
    			if ( comments_open() || get_comments_number() ) :
    				comments_template();
    			endif;
                    endwhile;
      ?>
        </div>
            <div class="col-lg-3 col-md-3">
                <div class="d_same_cat_news_parent">
                    <div class="d_same_cat_news">
                      <h5 class="o_spotlight_title d_most_read_post_wrap o_top_fact_check_title">এই বিভাগের অন্যান্য</h5>

                        <?php

                        $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
                        if( $related ) foreach( $related as $post ) {
                            setup_postdata($post); ?>

                            <div class="o_top_fact-wrap d_top_fact_background">
                                <h5 class="o_spotlight_headline o_top_fact_headline"><a  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                            </div>

                        <?php }
                        wp_reset_postdata(); ?>

                    </div>
                </div>
<!-- ফ্যাক্ট যাচাই করুন starts here-->

                <!--    twitter feed starts here-->
                <h5 class="o_spotlight_title o_top_fact_check_title">Follow us on twitter</h5>
                <div class="o_top_fact_check_wrap">
                    <?php dynamic_sidebar( 'twitter-feed' ); ?>
                </div>
                    <img class="d_donate" src="<?php echo get_template_directory_uri(); ?>/Images/donate2.png" alt="">

            </div>
        </div>
    </div><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
