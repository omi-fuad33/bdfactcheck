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

        <div class="col-lg-4 col-md-4">
<!-- ফ্যাক্ট যাচাই করুন starts here-->
                <h5 class="o_spotlight_title o_top_fact_check_title">ফ্যাক্ট যাচাই করুন</h5>
                <div class="o_top_fact_check_wrap">
                    <?php dynamic_sidebar( 'fact-test' ); ?>    
                </div>
                <!--    twitter feed starts here-->
                <h5 class="o_spotlight_title o_top_fact_check_title">Follow us on twitter</h5>
                <div class="o_top_fact_check_wrap">
                    <?php dynamic_sidebar( 'twitter-feed' ); ?>    
                </div>

                              <img class="d_donate" src="<?php echo get_template_directory_uri(); ?>/Images/donate2.png"" alt="">
        </div>
    </div>

</div>


<?php
get_footer();
