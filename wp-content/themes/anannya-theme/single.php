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
    <!-- <div class="d_override_container">-->
    <div class="row">
        <div class="col-lg-12">
            <div class="d_home_top">
                <img class="d_home_image" src="http://localhost/anannya/wp-content/uploads/2018/07/home.png">
                <img class="d_home_image" src="http://localhost/anannya/wp-content/uploads/2018/07/arrow.png">
                <p style="float:left"><?php $category = get_the_category();
                    $firstCategory = $category[0]->cat_name; echo $firstCategory;?></p>
                <img class="d_home_image" src="http://localhost/anannya/wp-content/uploads/2018/07/arrow.png">
                <p style="float:left"><?php the_title(); ?></p>
            </div>
            <hr class="style2">

        </div>
    </div>
</div>


<div class="container">
    <div class="d_post_top">
        <div class="row">
            <div class="col-lg-1 col-md-1">
                <div class="d_socialmedia_post">
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="d_single_cat_heading">
                    <?php $category = get_the_category();
                    $firstCategory = $category[0]->cat_name; echo $firstCategory;?>
                </div>
                <?php
                while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );

                the_post_navigation();

                endwhile; // End of the loop.
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
