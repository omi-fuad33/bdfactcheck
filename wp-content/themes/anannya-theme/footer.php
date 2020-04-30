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
                    <a href="<?php echo get_home_url(); ?>"><img class="d_header_logo d_footer_logo" src="<?php echo get_template_directory_uri(); ?>/Images/bdfactlogo-min.png"></a>
<!--
                        <p class="d_footer_clm_text">সম্পাদক ও প্রকাশকঃ তাসমিমা হোসেন <br>
                         &copy; প্রকাশক কর্তৃক সর্বস্বত্ব সংরক্ষিত</p>
-->
                    </div>
                </div>
                  <div class="offset-md-1 col-md-2 col-12">
                      <div class="d_footer_clm2">
                          <br><a href="<?php echo get_home_url(); ?>/?page_id=286"><p class="d_footer_clm_text">যোগাযোগ </p></a>
                          <a href="<?php echo get_home_url(); ?>/?page_id=217"><p class="d_footer_clm_text d_text_about_border">যাচাই প্রক্রিয়া</p></a>
                      </div>
                </div>
                <div class="d_footer_tab">
                    <div class="d_footer_table">
                        <ul class="d_list_parent">
                            <a href="<?php echo get_home_url(); ?>/?cat=7"><li>ফিচারড নিউজ</li></a>
                            <a href="<?php echo get_home_url(); ?>/?cat=42"><li>ফ্যাক্ট চেক</li></a>
                            <a href="<?php echo get_home_url(); ?>/?cat=37"><li>পলিটি চেক</li></a>
                            <a href="<?php echo get_home_url(); ?>/?cat=38"><li>হেলথ চেক</li></a>
                            <a href="<?php echo get_home_url(); ?>/?cat=39"><li>ফেসবুক গুজব</li></a>
                        </ul>
                    </div>
                    <div class="d_footer_table">
                        <ul class="d_list_parent">
                            <a href="<?php echo get_home_url(); ?>/?cat=41"><li>মিডিয়া ওয়াচ</li></a>
                            <a href="<?php echo get_home_url(); ?>/?cat=48"><li>পরিবেশ চেক</li></a>
                            <a href="<?php echo get_home_url(); ?>/?cat=49"><li>বিজনেস চেক</li></a>
                            <a href="<?php echo get_home_url(); ?>/?cat=36"><li>ফেক নিউজ</li></a>
                            <a href="<?php echo get_home_url(); ?>/?page_id=278"><li>ফ্যাক্টচেক অনুরোধ করুন</li></a>
                        </ul>
                    </div>
            </div>

                <div class="row d_footer_socIcon">

             <div class="offset-xl-1 d_footer_Social o_footer_social_fb">
                    <a href="https://www.facebook.com/bdfactcheck/"><img src="<?php echo get_template_directory_uri(); ?>/Images/facebook.png"></a>
                </div>
                <div class="offset-xl-1 offset-1 d_footer_Social o_footer_social_twitter">
                    <a href="https://twitter.com/BDFactChecks"><img src="<?php echo get_template_directory_uri(); ?>/Images/twitter.png"></a>
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

    </footer><!-- #colophon -->
    <div class="o_footer_copyright_wrap">
                <p class="o_footer_copyright_text">&copy; বিডি ফ্যাক্টচেক ২০২০, সর্বস্বত্ব সংরক্ষিত</p>
                <p class="o_footer_developer_text">Design & Development: <span>OMNISPACE</span></p>
            </div>
<!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
