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
    <div class="row">
        <div class="col-lg-9 o_slider_wrapper">
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
        <div class="col-lg-3 o_slider_right">
            <div class="spotlight_box">
                <h5 class="o_spotlight_title">স্পটলাইট</h5>
                <?php
						  $args = array('category_name' => 'ফিচার',
                              'posts_per_page' => 2, 
                              
                          ); //start counter
                            $slider_query=new WP_Query($args); //Need this to make pagination work
                            ?>
                            <?php
                                if(have_posts()) :  while($slider_query->have_posts()) : $slider_query->the_post(); 

                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                             ?>
                             <div id="spotlight_img">
                                <img class="spotlight_img" src="<?php echo $image_url[0]; ?>">
                              </div>
                              <h5 class="o_spotlight_headline"><a class="o_spotlight_headline"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>         
                             <?php endwhile;
                               endif;
                                   ?>
                             <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <div class="o_landscape_ad_landscape">
                 ADVERTISEMENT
            </div>
            
<!-- 2nd Row post starts-->
            <div class="row o_below_advertise1">
                <div class="col-lg-4">
                <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 3,
                                   'category_name' => 'রচনা',
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
                                    <h5 class="o_2nd_row_2_title o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
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
                                  'posts_per_page' => 3,
                                   'category_name' => 'অর্জন',
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
                                    <h5 class="o_2nd_row_2_title o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
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
                                  'posts_per_page' => 3,
                                   'category_name' => 'সাহিত্য',
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
                                    <h5 class="o_2nd_row_2_title o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
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
                <div class="col-lg-8">
                    <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 1,
                                   'category_name' => 'ফ্যাশন',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_3nd_row_post1">
                                        <img class="o_3rd_row_img" src="<?php echo $image_url[0]; ?>">
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

                <div class="col-lg-4 o_3rd_row_post_wrap">
                    <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 3,
                                   'category_name' => 'ফ্যাশন',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  ?>
                                    <div class="o_3rd_row_post1">
                                        <div class="o_3rd_row_post1_wrap">
                                            <p class="o_2nd_row_cat">ফেসবুক গুজব</p>
                                            <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                        </div>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_3rd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    <?php elseif($counter == 3) : ?>
                                    <h5 class="o_3rd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
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
                <div class="col-lg-4">
                     <!--    শীর্ষ ফ্যাক্ট চেক starts here-->
                <h5 class="o_spotlight_title o_top_fact_check_title">শীর্ষ ফ্যাক্ট চেক</h5>
                <div class="o_top_fact_check_wrap">
                        <?php
						  $args = array('category_name' => 'ফিচার',
                              'posts_per_page' => 5, 
                              
                          ); //start counter
                            $slider_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :  while($slider_query->have_posts()) : $slider_query->the_post(); 

                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                             ?>
                            <div class=" o_top_fact-wrap">
                                <!-- <img class="o_top_factcheck_img" src="<?php echo $image_url[0]; ?>"> -->
                                <h5 class="o_spotlight_headline o_top_fact_headline"><a class="o_spotlight_headline"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                            </div>       
                             <?php endwhile;
                               endif;
                                   ?>
                             <?php wp_reset_query(); ?>
                    </div>
                    <div class="o_sideber_ad1">
                         ADVERTISEMENT
                    </div>
                    <div class="o_sideber_ad2">
                         ADVERTISEMENT
                    </div>
                    <div class="o_sideber_ad3">
                         ADVERTISEMENT
                    </div>
                    <div class="o_sideber_ad4">
                         ADVERTISEMENT
                    </div>
                </div>
            </div>
            
<!--Advertisement block-->
        <div class="o_landscape_ad_landscape_big">
                 ADVERTISEMENT
            </div>
<!--4th row post starts-->
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-7">
                        <?php
                            $counter = 1; //start counter
                            $args = array(
                                          'posts_per_page' => 1,
                                           'category_name' => 'রূপ-চর্চা',
                                        ); //start counter
                                        $front_query=new WP_Query($args); //Need this to make pagination work
                                        if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                          <?php if($counter == 1) :
                                          $image_id = get_post_thumbnail_id();
                                                $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                            <div class="o_3nd_row_post1">
                                                <img class="o_4th_row_img" src="<?php echo $image_url[0]; ?>">
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
                    <div class="col-lg-5">
                         <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 3,
                                   'category_name' => 'রূপ-চর্চা',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  ?>
                                    <div class=".o_4th_row_post1">
                                            <p class="o_2nd_row_cat">রূপ-চর্চা</p>
                                            <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    <?php elseif($counter == 3) : ?>
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
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-7">
                        <?php
                            $counter = 1; //start counter
                            $args = array(
                                          'posts_per_page' => 1,
                                           'category_name' => 'জীবনযাপন',
                                        ); //start counter
                                        $front_query=new WP_Query($args); //Need this to make pagination work
                                        if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                          <?php if($counter == 1) :
                                          $image_id = get_post_thumbnail_id();
                                                $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                            <div class="o_3nd_row_post1">
                                                <img class="o_4th_row_img" src="<?php echo $image_url[0]; ?>">
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
                    <div class="col-lg-5">
                         <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 3,
                                   'category_name' => 'জীবনযাপন',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  ?>
                                    <div class=".o_4th_row_post1">
                                            <p class="o_2nd_row_cat">জীবনযাপন</p>
                                            <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_post_2ndrow_column1 o_4th_row_2_title_box"><a class="o_4th_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    <?php elseif($counter == 3) : ?>
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
            </div>
        </div>
<!--5th row post starts-->
    <div class="row">
        <div class="col-lg-8">
            <div class="row o_below_advertise1">
                <div class="col-lg-4">
                <?php
                    $counter = 1; //start counter
                    $args = array(
                                  'posts_per_page' => 3,
                                   'category_name' => 'মেল কর্নার',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_2nd_row_post1">
                                        <img class="o_2nd_row_img" src="<?php echo $image_url[0]; ?>">
                                        <p class="o_2nd_row_cat">মেল কর্নার</p>
                                        <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    <?php elseif($counter == 3) : ?>
                                    <h5 class="o_2nd_row_2_title o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
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
                                  'posts_per_page' => 3,
                                   'category_name' => 'মেন্টাল হেলথ',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_2nd_row_post1">
                                        <img class="o_2nd_row_img2" src="<?php echo $image_url[0]; ?>">
                                        <p class="o_2nd_row_cat">মেন্টাল হেলথ</p>
                                        <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    <?php elseif($counter == 3) : ?>
                                    <h5 class="o_2nd_row_2_title o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
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
                                  'posts_per_page' => 3,
                                   'category_name' => 'স্বাস্থ্য-ফিটনেস',
                                ); //start counter
                                $front_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :	while($front_query->have_posts()) :  $front_query->the_post(); ?>
                                  <?php if($counter == 1) :
                                  $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>
                                    <div class="o_2nd_row_post1">
                                        <img class="o_2nd_row_img" src="<?php echo $image_url[0]; ?>">
                                        <p class="o_2nd_row_cat">স্বাস্থ্য-ফিটনেস</p>
                                        <h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                  <?php elseif($counter == 2) : ?>
                                    <h5 class="o_2nd_row_2_title_box o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    <?php elseif($counter == 3) : ?>
                                    <h5 class="o_2nd_row_2_title o_post_2ndrow_column1"><a class="o_2nd_row_2_title"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
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
            <div class="o_sideber_ad2">
                 ADVERTISEMENT
             </div>
            <div class="o_sideber_ad4 o_sideber_ad4_green_color">
                 ADVERTISEMENT
             </div>
            <div class="o_sideber_ad4">
                 ADVERTISEMENT
             </div>
        </div>
<!--Advertisement box-->
        <div class="o_landscape_ad_landscape_big">
                 ADVERTISEMENT
         </div>
    </div>
<!--    খাবার দাবার starts here-->
                        <p class="o_2nd_row_cat">খাবারদাবার</p>
                        <div class="row">
                        <?php
						  $args = array('category_name' => 'খাবারদাবার',
                              'posts_per_page' => 3, 
                              
                          ); //start counter
                            $slider_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :  while($slider_query->have_posts()) : $slider_query->the_post(); 

                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                             ?>
                            <div class="col-lg-4">
                                <img class="o_khabardabar_img" src="<?php echo $image_url[0]; ?>">
                                <h5 class="o_post_2ndrow_column1 o_khabardabar_title"><a class="o_2nd_row_1_title o_khabardabar_title_text"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                            </div>       
                             <?php endwhile;
                               endif;
                                   ?>
                             <?php wp_reset_query(); ?>
                        </div>
<!--  Photo gallery satrts form here -->
    <div class="row o_gallery_wrap">
        <div class="col-lg-8">
            <p class="o_2nd_row_cat">গ্যালারি</p>
            <img class="o_photo_gallaery_feature" src="http://omnispace.co/a/wp-content/uploads/2018/11/HA_0873.jpg"><br>
                <div class="o_gallery_title_wrap">
                    <div><img class="o_camera_icon" src="http://omnispace.co/a/wp-content/uploads/2018/11/camera_icon1.png"></div>
                    <div class="o_gallery_title">ঈদের সাজ</div>
                </div>
                <div class="clearfix"></div>
            <div class="row">
                        <?php
						  $args = array('category_name' => 'খাবারদাবার',
                              'posts_per_page' => 3, 
                              
                          ); //start counter
                            $slider_query=new WP_Query($args); //Need this to make pagination work
                                if(have_posts()) :  while($slider_query->have_posts()) : $slider_query->the_post(); 

                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                             ?>
                            <div class="col-lg-4">
                                <img class="o_gallery_img" src="<?php echo $image_url[0]; ?>">
                                <div class="o_gallery_title_wrap">
                                    <div><img class="o_camera_icon_2ndrow" src="http://omnispace.co/a/wp-content/uploads/2018/11/camera_icon1.png"></div>
                                    <div class="o_gallery_title_2ndrow"><h5 class="o_post_2ndrow_column1"><a class="o_2nd_row_1_title o_khabardabar_title_text"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5></div>
                                </div>
                            </div>       
                             <?php endwhile;
                               endif;
                                   ?>
                             <?php wp_reset_query(); ?>
                        </div>
        </div>
        <div class="col-lg-4">
            
        </div>
    </div>
    <div style="height: 80px;"></div>
</div>
    <?php get_sidebar(); ?>
    <?php get_footer(); ?>

