<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anannya
 */

get_header();
?>

<div class="container">
    <!-- <div class="d_override_container">-->
    <div class="row">
        <div class="col-lg-12">
            <div class="d_home_top">
                <?php single_cat_title(); ?>
                <hr class="style1">
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <?php
            if ( have_posts() ) : ?>
            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'blog' );
            endwhile; ?>
            <div class="clearfix"></div>
            <?php
            else :

            get_template_part( 'template-parts/content', 'none' );

            endif; ?>
            <div class="d_pagination">
              <?php wpbeginner_numeric_posts_nav(); ?>
            </div>

        </div>

        <div class="clearfix"></div>
        <div class="col-lg-4 col-md-4">

          <div class="o_most_read_post_wrap d_most_read_post_wrap clearfix">
                                  <div class="o_most_read_button_wrap">
                                      <button class="o_most_read_button" id="o_most_recent_button">সর্বশেষ</button>
                                      <button class="o_most_read_button" id="o_most_read_button">সর্বাধিক পঠিত</button>
                                  </div>
                                  <?php
                                    $args = array('category_name' => 'ফিচার',
                                        'posts_per_page' => 7,

                                    ); //start counter
                                      $slider_query=new WP_Query($args); //Need this to make pagination work
                                          if(have_posts()) :  while($slider_query->have_posts()) : $slider_query->the_post();

                                       ?>
                                      <div class=" o_top_fact-wrap" id="o_most_recent_tab">
                                          <h5 class="o_spotlight_headline o_top_fact_headline"><a  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                      </div>
                                       <?php endwhile;
                                         endif;
                                             ?>
                                       <?php wp_reset_query(); ?>

                                       <?php
                                    $args = array('category_name' => 'ফিচার',
                                        'posts_per_page' => 7,

                                    ); //start counter
                                      $slider_query=new WP_Query($args); //Need this to make pagination work
                                          if(have_posts()) :  while($slider_query->have_posts()) : $slider_query->the_post();

                                       ?>
                                      <div class=" o_top_fact-wrap" id="o_most_read_tab">
                                          <h5 class="o_spotlight_headline o_top_fact_headline"><a  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                      </div>
                                       <?php endwhile;
                                         endif;
                                             ?>
                                       <?php wp_reset_query(); ?>
                              </div>
                              <img class="d_donate" src="<?php echo get_template_directory_uri(); ?>/Images/donate2.png"" alt="">
        </div>
    </div>

</div>


<?php
get_footer();
