<?php 
    /* Template Name: Video Gallery Page */ 
?>
<?php
get_header();
?>
<section class="o_photo_gallery_container container">
    <h1 class="o_homepage_heading">Video Gallery</h1>
    <div class="row">
       <?php
            $currentPage = get_query_var('paged');
            $args = array('category_name' => 'video-gallery',
                          'posts_per_page' => 20,
                          'paged' => $currentPage,

                      ); //start counter
            // Variable to call WP_Query.
            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) :
                // Start the Loop
                while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
            <div class="o_media_section_post_wrap col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <?php
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, 'full', true); 
            ?>
            <div class="o_gallery_post_wrap">
                <img class="o_media_section_img o_photo_gallery_img" src="<?php echo $image_url[0]; ?>">
                <div class="o_media_section_title_wrap">
                    <h5 class="o_media_section_title o_photo_gallery_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                </div>
            </div>
            </div>
            <?php endwhile; ?>
            <div class="o_pagination_links">
                 <?php echo paginate_links(array(
                'total' => $the_query->max_num_pages
                )); ?>
            </div>
            <?php
                  endif;
            ?>
            <?php wp_reset_query(); ?>
            </div>
</section>
<?php
get_footer();
