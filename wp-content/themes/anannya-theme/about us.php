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