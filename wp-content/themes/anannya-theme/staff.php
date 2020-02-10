<?php
   /*
       Template Name: Staff
    */
   ?>
<!-- The container which holds the content and rightside boxes -->
<?php
   get_header();
   ?>
<div class="container">
   <div class="row">
      <div class="col-lg-8 n_contains">
         <h3 class="n_title"><?php the_title(); ?></h3>
         <?php
            $counter = 1;
            $args = array('category_name' => 'staff',
                          'posts_per_page' => 3,
            
                      ); //start counter
                        $slider_query=new WP_Query($args); //Need this to make pagination work
                        ?>
         <div class="row n_check">
            <?php
               if(have_posts()) :  while($slider_query->have_posts()) : $slider_query->the_post();
               
               $image_id = get_post_thumbnail_id();
               $image_url = wp_get_attachment_image_src($image_id, 'full', true);
               ?>
            <?php if($counter == 1) :?>
            <div class="col-lg-4 n_staff_singleimage">
               <a class="n_a" href="<?php echo get_home_url(); ?>/activities/we-belong-we-care/">
                  <img class="n_image" src="<?php echo $image_url[0];?>">
                  <h5 class="n_staff_name"><?php the_title(); ?></h5>
               </a>
               <h5 class="n_staff_name"><?php the_content(); ?></h5>
            </div>
            <?php elseif($counter == 2) :?>
            <div class="col-lg-4 n_staff_singleimage">
               <a class="n_a" href="<?php echo get_home_url(); ?>/activities/we-belong-we-care/">
                  <img class="n_image" src="<?php echo $image_url[0];?>">
                  <h5 class="n_staff_name"><?php the_title(); ?></h5>
               </a>
               <h5 class="n_staff_name"><?php the_content(); ?></h5>
            </div>
            <?php elseif($counter == 3
               ) :?>
            <div class="col-lg-4 n_staff_singleimage">
               <a class="n_a" href="<?php echo get_home_url(); ?>/activities/we-belong-we-care/">
                  <img class="n_image" src="<?php echo $image_url[0];?>">
                  <h5 class="n_staff_name"><?php the_title(); ?></h5>
               </a>
               <h5 class="n_staff_name"><?php the_content(); ?></h5>
            </div>
         </div>
         <?php
            $counter = 0;
            endif;
            ?>
         <?php
            $counter++;
            
             endwhile;
            endif;
                ?>
         <?php wp_reset_query(); ?>
      </div>
       
       <!-- Sidebar things start here -->
      <div class="col-lg-4 n_sidebar_marginCon">
         <div class="o_most_read_post_wrap clearfix">
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
               <h5 class="o_spotlight_headline o_top_fact_headline"><a class="o_spotlight_headline"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
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
               <h5 class="o_spotlight_headline o_top_fact_headline"><a class="o_spotlight_headline"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
            </div>
            <?php endwhile;
               endif;
                   ?>
            <?php wp_reset_query(); ?>
         </div><br>
          
          <?php
   while ( have_posts() ) : the_post(); 
   $image_id = get_post_thumbnail_id();
   $image_url = wp_get_attachment_image_src($image_id, 'full', true);
   ?>
          <img class="n_imageFull" src="<?php echo $image_url[0];?>">
          <?php
   endwhile; //resetting the page loop
   wp_reset_query(); //resetting the page query
   ?>
          
      </div>
       
    <!-- Sidebar things end here -->
       
   </div>
</div>
<?php
   get_footer();
   ?>