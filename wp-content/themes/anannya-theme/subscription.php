<?php
   /*
       Template Name: Subscriptionnew
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

          <h3 class="n_titleSub"><?php the_title(); ?></h3>

<!--         <div class="n_content"><?php the_content();?></div><br><br><br><br>-->
          <!-- EMAIL FORM STARTS -->


                        <form id="reused_form">
                            <div class="form-group">
                                <label >নাম</label>
                                <input type="text" name="name" required class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label >ইমেইল</label>
                                <input type="email" name="email" required class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label >মোবাইল নম্বর  (অপশনাল)</label>
                                <input type="tel" name="phone" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label >প্রশ্নটি করুন</label>
                                <textarea id="question" class="form-control" maxlength="300" placeholder="প্রশ্ন *" name="text" cols="50" rows="10"></textarea>

<!--                                <input type="textarea" name="text" required class="form-control" placeholder="প্রশ্ন" cols="50" rows="10">-->
                            </div>

                            <div class="form-group">
                                <button class="btn n_titleSub" type="submit">প্রশ্নটি করুন</button>
                            </div>

<!--
            <div class="form-group">
                                <button class="btn btn-raised btn-lg btn-warning" type="submit">Send</button>
                            </div>
-->
                        </form>



                        <div id="error_message" style="width:100%; height:100%; display:none; ">
                            <h4>
                                Error
                            </h4>
                            ভুল থাকার কারণে মেইলটি সেন্ড হয়নি।
                        </div>
                            <div id="success_message" style="width:100%; height:100%; display:none; ">
                            <h2 style="color:black;font-size:20px;"> ধন্যবাদ! আপনার মেইলটি সেন্ড হয়েছে। দ্রুত আপনার সাথে যোগাযোগ করা হবে।</h2>
                        </div>
         <?php
            endwhile; //resetting the page loop
            wp_reset_query(); //resetting the page query
            ?>

      </div>

              <!-- Sidebar things start here -->
      <div class="col-xl4 col-lg-4 col-md-6 col-sm-6 col-12 n_sidebar_marginSub">
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
