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
                <img class="d_home_image" src="http://omnispace.co/a/wp-content/uploads/2018/07/home.png">
                <img class="d_home_image" src="http://omnispace.co/a/wp-content/uploads/2018/07/arrow.png">
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
            <?php numeric_posts_nav(); ?>
        </div>

        <div class="clearfix"></div>
        <div class="col-lg-4 col-md-4">
            <div class="d_recent_news_parent">
                <div class="d_recent_news">
                    <p class="d_recent_heading">সর্বশেষ</p>
                    <hr class="style1">
                    <?php $counter = 0; ?>
                    <?php
                    $recent_posts=new WP_Query('posts_per_page=4');
                    if($recent_posts->have_posts()): 
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                    <a class="d_heading_text" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    <?php if($counter <3)
{ ?>
                    <hr class="d_recentnews_hr">
                    <?php $counter++;
} ?>

                    <?php

                    endwhile; 
                    endif;
                    ?>


                </div>
            </div>
        </div>
    </div>

</div>


<?php
get_footer();
