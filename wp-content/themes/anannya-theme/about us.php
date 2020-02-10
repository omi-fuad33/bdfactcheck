<?php
   /*
       Template Name: Lakshya
    */
   ?>

<!-- The container which holds the content and rightside boxes -->
<?php
   get_header();
   ?>
<div class="container">


<!-- The row that holds the content and right boxes-->
   <div class="row">
       <!-- The Content of the page-->
      <div class="offset-xl-1 col-xl-7 offset-lg-1 col-lg-7 col-md-6 com-sm-6 col-12 n_contains">
          
         <?php
            while ( have_posts() ) : the_post(); 
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id, 'full', true);
            
          ?>
         
          <h3 class="n_title"><?php the_title(); ?></h3>
    
         <div class="n_content"><?php the_content();?></div><br><br><br><br>
         <?php
            endwhile; //resetting the page loop
            wp_reset_query(); //resetting the page query
            ?>
          
      </div>
       
              <!-- Sidebar things start here -->
      <div class="col-xl4 col-lg-4 col-md-6 col-sm-6 col-12 n_sidebar_margin">
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
   $image_id = get_post_thumbnail_id(260);
   $image_url = wp_get_attachment_image_src($image_id, 'full', true);
   ?>
          <img class="n_imageFull img-responsive" src="<?php echo $image_url[0];?>">
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