<?php
   /*
       Template Name: Contact Us
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
         
          <h3 class="n_titleCon"><?php the_title(); ?></h3>
    
         <div class="n_contentCon">
          <img class="n_iconImMap" src="<?php echo get_template_directory_uri(); ?>/Images/home-address.png">
             <span class="n_iconTxMap">One Gateway Center, Suite 25500+,Newark 23, NJ 10235 </span>
          
          </div>
          
           <div class="n_contentCon">
          &nbsp;<img class="n_iconImEm" src="<?php echo get_template_directory_uri(); ?>/Images/email.png">
             <span class="n_iconTxEm">bdfactchecks@gmail.com</span><br>
               <span class="n_iconTxEm2">armanzahed@gmail.com
          </span>
                 
          </div>
          
          <div class="n_contentCon">
          &nbsp;<img class="n_iconImPhn" src="<?php echo get_template_directory_uri(); ?>/Images/phone.png">
             <span class="n_iconTxPhn">+(91) 123 277 4239  </span>
          
          </div>
          
          
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