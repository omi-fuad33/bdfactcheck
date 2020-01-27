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
      <div class="offset-lg-1 col-lg-7 n_contains">
          
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
    </div>
</div>
     

  

<?php
   get_footer();
   ?>