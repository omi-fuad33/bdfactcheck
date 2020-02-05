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
			<div class="d_true_false">
				<div class="d_tf_boxes">
					<span class="d_tf_button b1"></span>সত্য
					<span class="d_tf_button b2"></span>মিথ্যা
					<span class="d_tf_button b3"></span>আংশিক সত্য
					<span class="d_tf_button b4"></span>আংশিক মিথ্যা

				</div>

				<?php
            if (has_category('ৎ-সত্য'))
            { ?>
                <p class="d_tf_bar1"></p>
								<?php
							}
							 elseif (has_category('ৎ-মিথ্যা'))
							{
								?>
              <p class="d_tf_bar2"></p>

							<?php
						}
						 elseif (has_category('ৎ-আংশিক সত্য'))
						{
							?>

								<p class="d_tf_bar3"></p>
								<?php
							}
							 elseif (has_category('ৎ-আংশিক মিথ্যা'))
							{
								?>

							  <p class="d_tf_bar4"></p>
								<?php
							}
							?>


			</div>
			<div class="d-sm-block d-md-none col-12 d_single_sml">
				<?php $category = get_the_category();
				$category_id = the_category_id(false);
				?>

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
