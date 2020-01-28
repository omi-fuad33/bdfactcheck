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
                                <h5 class="o_spotlight_headline o_top_fact_headline"><a class="o_spotlight_headline"  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                            </div>
                             <?php endwhile;
                               endif;
                                   ?>
                             <?php wp_reset_query(); ?>
                    </div>
