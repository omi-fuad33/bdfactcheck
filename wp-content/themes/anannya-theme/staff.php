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
    
        <div class="row n_imageRow">
            <div class="offset-lg-1 col-lg-7 n_contains">
                
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
             <div class="offset-lg-1 col-lg-3">
                  <a class="n_a" href="<?php echo get_home_url(); ?>/activities/we-belong-we-care/"><img class="n_image" src="<?php echo $image_url[0];?>">
                    <h5 class="n_titleAct"><?php the_content(); ?></h5></a>
            </div>
            
            
              <?php elseif($counter == 2) :?>
             <div class="offset-lg-1 col-lg-3">
                    <a class="n_a" href="<?php echo get_home_url(); ?>/activities/we-belong-we-care/"><img class="n_image" src="<?php echo $image_url[0];?>">
                    <h5 class="n_titleAct"><?php the_title(); ?></h5></a>
                    <br><br>
            </div>
            
              <?php elseif($counter == 3
                      ) :?>
             <div class="col-lg-4">
                    <a class="n_a" href="<?php echo get_home_url(); ?>/daily-digest/"><img class="n_image" src="<?php echo $image_url[0];?>" href="">
                    <h5 class="n_titleAct"><?php the_title(); ?></h5></a>
                    <br><br>
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
    </div>
</div>
<?php
   get_footer();
   ?>
