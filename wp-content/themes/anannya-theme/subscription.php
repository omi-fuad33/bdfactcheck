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
