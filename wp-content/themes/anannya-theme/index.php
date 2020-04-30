<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anannya
 */

get_header();
?>
<div class="container">
    <div class="row o_featured_bottom_margin">
        <div class="col-lg-8 o_slider_wrapper">
<!--Slider Starts-->
                <div class="o_featured_slider">
                     <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
						<?php
						  $args = array('category_name' => 'ফিচার',
                              'posts_per_page' => 3, 
                              
                          ); //start counter
                            $slider_query=new WP_Query($args); //Need this to make pagination work
                            ?>
                         <div class="carousel-inner">
                             <?php
                                if(have_posts()) :  while($slider_query->have_posts()) : $slider_query->the_post(); 

                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'slider-thumbnail', true);
                             ?>
                             <div id="slider_img" class="carousel-item <?php if($slider_query->current_post == 0) : ?>active<?php endif; ?>">
                                <img class="slider_img" src="<?php echo $image_url[0]; ?>">
                                    <div class="o_slider_headline_box">
                                        <h5 class="o_slider_h5"><a class="o_slider_headline"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                              </div>
                                        
                             <?php endwhile;
                               endif;
                                   ?>
                             <?php wp_reset_query(); ?>
                         </div>
                             <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                         </div><!-- /.carousel -->
                    </div>
<!-- Advertisement block-->
        </div>
        <div class="col-lg-4 o_slider_right">
            <div class="spotlight_box">
                <h5 class="o_spotlight_title o_spotlight_title_top">শীর্ষ ফ্যাক্টচেক</h5>
                <div class="o_top_fact_check_wrap_top">
                        <?php
						                $args = array('category_name' => 'শীর্ষ-ফ্যাক্ট-চেক',
                              'posts_per_page' => 4, 
                              
                          ); //start counter
                            $slider_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :  while($slider_query->have_posts()) : $slider_query->the_post();
                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'thumbnail', true);
                             ?>
                            <div class="row o_top_fact_wrap_top">
                                <div class="o_top_fact_img col-lg-4 col-4 col-sm-4">
                                  <img class="" src="<?php echo $image_url[0]; ?>">
                                </div>
                                <div class="col-lg-8 col-8 col-sm-8 o_top_fact_headline_top_wrap"><a class="o_top_fact_headline_top"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
                            </div>       
                             <?php endwhile;
                               endif;
                                   ?>
                             <?php wp_reset_query(); ?>
                    </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <div class="o_landscape_ad_landscape">
                 <p>AD</p>
            </div>
            
<!-- 2nd Row post starts-->
            <div class="row o_below_advertise1">
                <div class="col-lg-4">
                <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 4,
                                   'category_name' => 'ফেক-নিউজ',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_2nd_row_post1">
                                        <img class="o_2nd_row_img" src="<?php echo $image_url[0]; ?>">
                                        <p class="o_2nd_row_cat">ফেক নিউজ</p>
                                        <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 3) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 4) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php
                                        $counter = 0;
                                        endif;
                                        ?>
                                        <?php
                                        $counter++;
                                        endwhile; 
                                        //Pagination can go here if you want it.
                                        endif;
                                    ?>
                        <?php wp_reset_query(); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 4,
                                   'category_name' => 'পলিটি-চেক',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_2nd_row_post1">
                                        <img class="o_2nd_row_img2" src="<?php echo $image_url[0]; ?>">
                                        <p class="o_2nd_row_cat">পলিটি চেক</p>
                                        <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 3) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 4) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php
                                        $counter = 0;
                                        endif;
                                        ?>
                                        <?php
                                        $counter++;
                                        endwhile; 
                                        //Pagination can go here if you want it.
                                        endif;
                                    ?>
                        <?php wp_reset_query(); ?>
                    </div>
                <div class="col-lg-4">
                    <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 4,
                                   'category_name' => 'হেলথ-চেক',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_2nd_row_post1">
                                        <img class="o_2nd_row_img" src="<?php echo $image_url[0]; ?>">
                                        <p class="o_2nd_row_cat">হেলথ চেক</p>
                                        <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 3) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 4) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php
                                        $counter = 0;
                                        endif;
                                        ?>
                                        <?php
                                        $counter++;
                                        endwhile; 
                                        //Pagination can go here if you want it.
                                        endif;
                                    ?>
                        <?php wp_reset_query(); ?>
                 </div>
            </div>
            <!--3rd Row post starts-->
            <div class="row o_post_3rd_row">
            <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 5,
                                   'category_name' => 'ফেসবুক-গুজব',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="col-lg-6">
                                      <p class="o_2nd_row_cat">ফেসবুক গুজব</p>
                                        <img class="o_facebook_gujob_col1_img" src="<?php echo $image_url[0]; ?>">
                                        <div class="o_facebook_gujob_info_box">
                                          <h5 class="o_post_2ndrow_column1 o_facebook_gujob_title"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                          <div class="d-md-none d-lg-block">
                                            <?php echo the_excerpt(); ?>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 o_facebook_gujob_right_column">
                                  <?php elseif($counter == 2) :
                                    $image_id = get_post_thumbnail_id();
                                    $image_url = wp_get_attachment_image_src($image_id, 'thumbnail', true); ?>
                                    <div class="row o_facbook_gujob_cl2_post">
                                      <div class="o_top_fact_img col-lg-4 col-4 col-sm-4">
                                          <img class="" src="<?php echo $image_url[0]; ?>">
                                      </div>
                                      <div class="col-lg-8 col-8 col-sm-8 o_top_fact_headline_top_wrap"><a class="o_top_fact_headline_top"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
                                    </div>
                                    <?php elseif($counter == 3) :
                                    $image_id = get_post_thumbnail_id();
                                    $image_url = wp_get_attachment_image_src($image_id, 'thumbnail', true); ?>
                                    <div class="row o_facbook_gujob_cl2_post">
                                      <div class="o_top_fact_img col-lg-4 col-4 col-sm-4">
                                          <img class="" src="<?php echo $image_url[0]; ?>">
                                      </div>
                                      <div class="col-lg-8 col-8 col-sm-8 o_top_fact_headline_top_wrap"><a class="o_top_fact_headline_top"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
                                    </div>
                                    <?php elseif($counter == 4) :
                                    $image_id = get_post_thumbnail_id();
                                    $image_url = wp_get_attachment_image_src($image_id, 'thumbnail', true); ?>
                                    <div class="row o_facbook_gujob_cl2_post">
                                      <div class="o_top_fact_img col-lg-4 col-4 col-sm-4">
                                          <img class="" src="<?php echo $image_url[0]; ?>">
                                      </div>
                                      <div class="col-lg-8 col-8 col-sm-8 o_top_fact_headline_top_wrap"><a class="o_top_fact_headline_top"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
                                    </div>
                                    <?php elseif($counter == 5) :
                                    $image_id = get_post_thumbnail_id();
                                    $image_url = wp_get_attachment_image_src($image_id, 'thumbnail', true); ?>
                                    <div class="row o_facbook_gujob_cl2_post">
                                      <div class="o_top_fact_img col-lg-4 col-4 col-sm-4">
                                          <img class="" src="<?php echo $image_url[0]; ?>">
                                      </div>
                                      <div class="col-lg-8 col-8 col-sm-8 o_top_fact_headline_top_wrap"><a class="o_top_fact_headline_top"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
                                    </div>
                                    </div>
                                  <?php
                                        $counter = 0;
                                        endif;
                                        ?>
                                        <?php
                                        $counter++;
                                        endwhile; 
                                        //Pagination can go here if you want it.
                                        endif;
                                    ?>
                        <?php wp_reset_query(); ?>
            </div>
            <div class="o_disclaimer_text_wrap">
              <div class="o_disclaimer_logo">
                <img src="<?php echo get_template_directory_uri(); ?>/Images/bdfactlogo-min.png" alt="image not found"><span>আমাদের লক্ষ্য!</span>
              </div>
              <div class="o_disclaimer_text">
              <?php
                $post_id = 373;
                $queried_post = get_post($post_id);
                $content = $queried_post->post_content;
              ?>
              <?php echo $content; ?>
              </div>
            </div>
            <div class="o_landscape_ad_landscape o_landscape_ad_landscape_after_disclaimer">
                 <p>AD</p>
            </div>
        </div>
                <div class="col-lg-4">
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
                    <!-- <div class="o_sideber_ad2">
                         <p>ADVERTISEMENT</p>
                    </div> -->
                    <div class="o_sideber_ad4 o_sideber_ad4_green_color">
                      <p>AD</p>
                    </div>
                    <!-- <div class="o_sideber_ad4 o_sideber_ad4_margin_bottom">
                         <p>ADVERTISEMENT</p>
                    </div> -->
                    <img class="o_donate_front_page" src="<?php echo get_template_directory_uri(); ?>/Images/donate2.png" alt="">
                </div>
            </div>
<!--4th row post starts-->
<div class="row o_after_disclaimer_row">
  <div class="col-lg-3 o_media_school_content">
          <?php
      $counter = 1; //start counter
      $args = array(
                    'posts_per_page' => 4,
                    'category_name' => 'পাবলিক-ফিগার',
                  ); //start counter
                  $front_query=new WP_Query($args); //Need this to make pagination work
                  if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                    <?php if($counter == 1) :
                    ?>
                      <div class="o_4th_row_post1">
                              <p class="o_2nd_row_cat o_2nd_row_cat">পাবলিক ফিগার</p>
                              <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      </div>
                    <?php elseif($counter == 2) : ?>
                      <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      <?php elseif($counter == 3) : ?>
                      <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      <?php elseif($counter == 4) : ?>
                        <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                    <?php
                          $counter = 0;
                          endif;
                          ?>
                          <?php
                          $counter++;
                          endwhile; 
                          //Pagination can go here if you want it.
                          endif;
                      ?>
          <?php wp_reset_query(); ?>
    </div>
    <div class="col-lg-3 o_media_school_content">
          <?php
      $counter = 1; //start counter
      $args = array(
                    'posts_per_page' => 4,
                    'category_name' => 'দল-প্রতিষ্ঠান',
                  ); //start counter
                  $front_query=new WP_Query($args); //Need this to make pagination work
                  if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                    <?php if($counter == 1) :
                    ?>
                      <div class="o_4th_row_post1">
                              <p class="o_2nd_row_cat o_2nd_row_cat">দল/প্রতিষ্ঠান</p>
                              <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      </div>
                    <?php elseif($counter == 2) : ?>
                      <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      <?php elseif($counter == 3) : ?>
                      <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      <?php elseif($counter == 4) : ?>
                        <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                    <?php
                          $counter = 0;
                          endif;
                          ?>
                          <?php
                          $counter++;
                          endwhile; 
                          //Pagination can go here if you want it.
                          endif;
                      ?>
          <?php wp_reset_query(); ?>
    </div>
    <div class="col-lg-3 o_media_school_content">
          <?php
      $counter = 1; //start counter
      $args = array(
                    'posts_per_page' => 4,
                    'category_name' => 'গণমাধ্যম',
                  ); //start counter
                  $front_query=new WP_Query($args); //Need this to make pagination work
                  if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                    <?php if($counter == 1) :
                    ?>
                      <div class="o_4th_row_post1">
                              <p class="o_2nd_row_cat o_2nd_row_cat">গণমাধ্যম</p>
                              <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      </div>
                    <?php elseif($counter == 2) : ?>
                      <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      <?php elseif($counter == 3) : ?>
                      <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      <?php elseif($counter == 4) : ?>
                        <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                    <?php
                          $counter = 0;
                          endif;
                          ?>
                          <?php
                          $counter++;
                          endwhile; 
                          //Pagination can go here if you want it.
                          endif;
                      ?>
          <?php wp_reset_query(); ?>
    </div>
    <div class="col-lg-3 o_media_school_content">
          <?php
      $counter = 1; //start counter
      $args = array(
                    'posts_per_page' => 4,
                    'category_name' => 'সামাজিক-মাধ্যম',
                  ); //start counter
                  $front_query=new WP_Query($args); //Need this to make pagination work
                  if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                    <?php if($counter == 1) :
                    ?>
                      <div class="o_4th_row_post1">
                              <p class="o_2nd_row_cat o_2nd_row_cat">সামাজিক মাধ্যম</p>
                              <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      </div>
                    <?php elseif($counter == 2) : ?>
                      <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      <?php elseif($counter == 3) : ?>
                      <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                      <?php elseif($counter == 4) : ?>
                        <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                    <?php
                          $counter = 0;
                          endif;
                          ?>
                          <?php
                          $counter++;
                          endwhile; 
                          //Pagination can go here if you want it.
                          endif;
                      ?>
          <?php wp_reset_query(); ?>
    </div>
</div>
<!--Advertisement block-->
<div class="o_landscape_ad_landscape_big">
                 AD
            </div>
<!--5th row post starts-->
    <div class="row">
        <div class="col-lg-8">
            <div class="row o_below_advertise1">
                <div class="col-lg-4">
                <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 4,
                                   'category_name' => 'মিডিয়া-ওয়াচ',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_2nd_row_post1">
                                        <img class="o_2nd_row_img" src="<?php echo $image_url[0]; ?>">
                                        <p class="o_2nd_row_cat">মিডিয়া ওয়াচ</p>
                                        <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 3) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 4) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php
                                        $counter = 0;
                                        endif;
                                        ?>
                                        <?php
                                        $counter++;
                                        endwhile; 
                                        //Pagination can go here if you want it.
                                        endif;
                                    ?>
                        <?php wp_reset_query(); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 4,
                                   'category_name' => 'পরিবেশ-চেক',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_2nd_row_post1">
                                        <img class="o_2nd_row_img2" src="<?php echo $image_url[0]; ?>">
                                        <p class="o_2nd_row_cat">পরিবেশ চেক</p>
                                        <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 3) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 4) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php
                                        $counter = 0;
                                        endif;
                                        ?>
                                        <?php
                                        $counter++;
                                        endwhile; 
                                        //Pagination can go here if you want it.
                                        endif;
                                    ?>
                        <?php wp_reset_query(); ?>
                    </div>
                <div class="col-lg-4">
                    <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 4,
                                   'category_name' => 'বিজনেস-চেক',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_2nd_row_post1">
                                        <img class="o_2nd_row_img" src="<?php echo $image_url[0]; ?>">
                                        <p class="o_2nd_row_cat">বিজনেস চেক</p>
                                        <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 3) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php elseif($counter == 4) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                  <?php
                                        $counter = 0;
                                        endif;
                                        ?>
                                        <?php
                                        $counter++;
                                        endwhile; 
                                        //Pagination can go here if you want it.
                                        endif;
                                    ?>
                        <?php wp_reset_query(); ?>
                 </div>
                </div>
        </div>
        <div class="col-lg-4 o_5th_row_post_right">
            <div class="o_sideber_ad4 o_sideber_ad4_green_color">
                 <p>AD</p>
             </div>
            <div class="o_sideber_ad4 o_sideber_ad4_beside_business_check">
                 <p>AD</p>
             </div>
        </div>
    </div>
<!--  Photo gallery satrts form here -->
    <div class="o_gallery_wrap">
            <p class="o_2nd_row_cat">মাল্টিমিডিয়া</p>
            <div class="o_home_gallery_wrapper row">
            <div class="col-lg-7">
                <div class="o_home_video_gallery">
                    <?php dynamic_sidebar( 'front-page-gallery' ); ?>
                </div>
                <!-- <a href="<?php echo get_home_url(); ?>/photo-gallery/"><button class="o_gallery_button">View More</button></a> -->
            </div>
            <div class="col-lg-5 o_home_gallery_photo_container">
                <div class="o_home_gallery_photo">
                    <?php dynamic_sidebar( 'front-page-video-1' ); ?>
                </div>
                <div class="o_home_gallery_photo">
                    <?php dynamic_sidebar( 'front-page-video-2' ); ?>
                </div>
                <!-- <a href="<?php echo get_home_url(); ?>/Video-gallery/"><button class="o_gallery_button o_photo_gallery_button">View More</button></a> -->
            </div>
    </div>
    </div>
    <div style="height: 80px;"></div>
</div>
    <?php get_sidebar(); ?>
    <?php get_footer(); ?>

