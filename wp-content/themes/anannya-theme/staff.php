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
               <div class="n_a">
                  <img class="n_image" src="<?php echo $image_url[0];?>">
                  <h5 class="o_staff_name"><?php the_title(); ?></h5>
            </div>
               <p class=""><?php the_content(); ?></p>
            </div>
            <?php elseif($counter == 2) :?>
            <div class="col-lg-4 n_staff_singleimage">
            <div class="n_a">
                  <img class="n_image" src="<?php echo $image_url[0];?>">
                  <h5 class="o_staff_name"><?php the_title(); ?></h5>
            </div>
               <p class=""><?php the_content(); ?></p>
            </div>
            <?php elseif($counter == 3
               ) :?>
            <div class="col-lg-4 n_staff_singleimage">
            <div class="n_a">
                  <img class="n_image" src="<?php echo $image_url[0];?>">
                  <h5 class="o_staff_name"><?php the_title(); ?></h5>
            </div>
               <p class=""><?php the_content(); ?></p>
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
        <!-- ফ্যাক্ট যাচাই করুন starts here-->
        <h5 class="o_spotlight_title o_top_fact_check_title">ফ্যাক্ট যাচাই করুন</h5>
                <div class="o_top_fact_check_wrap">
                    <?php dynamic_sidebar( 'fact-test' ); ?>    
                </div>
                <img class="o_donate_front_page" src="<?php echo get_template_directory_uri(); ?>/Images/donate2.png" alt="">
                <br>
                <br>
          
      </div>
       
    <!-- Sidebar things end here -->
       
   </div>
</div>
<?php
   get_footer();
   ?>