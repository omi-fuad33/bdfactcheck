<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anannya
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php anannya_post_thumbnail(); ?>
			<div class="d-sm-block d-md-none col-12 d_single_sml">
				<?php $category = get_the_category(); ?>
					<p class="d_single_cat"> <?php $firstCategory = $category[0]->cat_name; echo $firstCategory;?></p>
							<p class="d_single_date"><?php echo get_the_date(); ?> , <?php echo get_the_time(); ?></p>
							<p class="d_last-modified">Last modified: <?php echo get_the_modified_date(); ?> , <?php echo get_the_modified_time(); ?></p>
							<p><?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?></p>
			</div>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="d_single_title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="d_single_content">
    <?php
    the_content( sprintf(
        wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'anannya' ),
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        ),
        get_the_title()
    ) );

    wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'anannya' ),
        'after'  => '</div>',
    ) );
    ?>
	</div><!-- .entry-content -->

</article>
<footer class="entry-footer">
    <?php anannya_entry_footer(); ?>
</footer><!-- .entry-footer -->
