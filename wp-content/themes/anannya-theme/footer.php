<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Anannya
 */

?>

	<!-- #content -->

	<footer class="d_site-footer n_site-footer">
        <div class="d_footerMain container-fluid">
            <div class="row n_test">
                <div class="col-md-3 offset-md-1">
                    <div class="d_footer_clm1">
                    <img class="d_header_logo d_footer_logo" src="<?php echo get_template_directory_uri(); ?>/Images/bdfactlogo-min.png">
<!--
                        <p class="d_footer_clm_text">সম্পাদক ও প্রকাশকঃ তাসমিমা হোসেন <br>
                         &copy; প্রকাশক কর্তৃক সর্বস্বত্ব সংরক্ষিত</p>
-->
                    </div>
                </div>
                  <div class="offset-md-1 col-md-2 col-12">
                      <div class="d_footer_clm2">
                          <br><a href=""><p class="d_footer_clm_text">যোগাযোগ </p></a>
                          <a href=""><p class="d_footer_clm_text d_text_about_border">আমাদের সম্পর্কে</p></a>
                      </div>
                </div>
                <div class="d_footer_tab">
                    <div class="d_footer_table">
                        <ul class="d_list_parent">
                            <a href=""><li>ফিচারড নিউজ</li></a>
                            <a href=""><li>ফ্যাক্ট চেক</li></a>
                            <a href=""><li>পলিটি চেক</li></a>
                            <a href=""><li>হেলথ চেক</li></a>
                            <a href=""><li>ফেসবুক গুজব</li></a>
                        </ul>
                    </div>
                    <div class="d_footer_table">
                        <ul class="d_list_parent">
                            <a href=""><li>মিডিয়া ওয়াচ</li></a>
                            <a href=""><li>পরিবেশ চেক</li></a>
                            <a href=""><li>বিজনেস চেক</li></a>
                            <a href=""><li>ফ্যাক্টচেক অনুরোধ</li></a>
                            <a href=""><li>মাল্টিমিডিয়া</li></a>
                        </ul>
                    </div>
            </div>

                <div class="row d_footer_socIcon">

             <div class="offset-xl-1 d_footer_Social o_footer_social_fb">
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/Images/facebook.png"></a>
                </div>
                <div class="offset-xl-1 offset-1 d_footer_Social o_footer_social_twitter">
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/Images/twitter.png"></a>
                </div>
                <div class="offset-xl-1 offset-1 d_footer_Social o_footer_social_instagram">
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/Images/instagram.png"></a>
                </div>
                <div class="offset-xl-1 offset-1 d_footer_Social">
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/Images/youtube.png"></a>
                </div>
            </div>

            </div>




            </div>
    <div class="d_footer_2nd_row_text"><p>&copy; বিডিফ্যাক্টচেক ২০২০, সর্বস্বত্ব সংরক্ষিত</p></div>
    <div class="d_footer_2nd_row_text d_footer_3rd_row_text">Design & Development: <span><a href=""><img src="<?php echo get_template_directory_uri(); ?>/Images/Omni_blue_logo.png" alt="logo not found"></a></span></div>

	</footer><!-- #colophon -->
<!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
