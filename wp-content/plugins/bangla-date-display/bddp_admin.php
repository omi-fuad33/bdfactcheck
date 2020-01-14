<?php

defined( 'ABSPATH' )or die( 'Stop! You can not do this!' );

function bddp_options_page() {
	?>
	<div class="wrap">
		<h1 style="margin-bottom:5px;">Bangla Date Display Settings <a href="#how_to_use" class="button button-secondary">How to use?</a> <a href="#credits" class="button button-secondary">Credits</a> <a target="_blank" href="http://xhostbd.com" class="button button-secondary">xHOSTBD.com</a></h1>
		<br/>

		<?php if(isset($_POST["restore_defaults"]) == "1") { delete_option('bddp_options'); } ?>

		<form method="post" action="options.php">

			<?php

			function rplc_symbol( $symbol ) {
				$symbol = str_replace( '"', '&#34;', $symbol );
				return $symbol;
			}

			settings_fields( 'bddp-settings-group' );

			$bddp_options = get_option( "bddp_options" );
			if ( !is_array( $bddp_options ) ) {
				$bddp_options = array(
					'trans_dt' => '0',
					'bangla_tz' => '6',
					'en_tz' => '6',
					'trans_cmnt' => '0',
					'trans_num' => '0',
					'trans_cal' => '0',
					'dt_change' => '0',
					'ord_suffix' => '1',
					'separator' => ', ',
					'last_word' => '1',
					'hijri_adjust' => '-24',
					'cal_wgt' => '0' );
			}

			?>


			<div class="postbox">
				<h3 class="hndle" style="padding: 10px; margin: 0;"><span>Date/Time Translation Settings</span></h3>
				<div class="inside">
					<p align="justify">Display Time, Date and Numbers in Bangla language. It can replace all Latin numbers with Bangla numbers on front areas.
						<table class="form-table">
							<tr valign="top">
								<th scope="row">Translate:</th>
								<td colspan="3">
									<input id="bddp_options[trans_dt]" type="checkbox" name="bddp_options[trans_dt]" value="1" <?php if(isset($bddp_options[ 'trans_dt'])==1) echo( 'checked="checked"'); ?>/><label for="bddp_options[trans_dt]">Date/Time</label>
								</td>
							</tr>
							<tr valign="top">
								<td></td>
								<td><input id="bddp_options[trans_cmnt]" type="checkbox" name="bddp_options[trans_cmnt]" value="1" <?php if(isset($bddp_options[ 'trans_cmnt'])==1) echo( 'checked="checked"'); ?>/><label for="bddp_options[trans_cmnt]">Comment Count</label>
								</td>
							</tr>
						</table>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle" style="padding: 10px; margin: 0;"><span>Gregorian Date/Time Settings</span></h3>
				<div class="inside">
					<p align="justify">Choose a time zone for gregorian date...</p>

					<table class="form-table">
						<tr valign="top">
							<th scope="row"><label for="greg_tz">Time Zone:</label>
							</th>
							<td>
								<select id="greg_tz" name="bddp_options[en_tz]">
									<option value="-12" <?php if($bddp_options[ 'en_tz']=="-12" ) { echo " selected"; } ?>>GMT -12</option>
									<option value="-11" <?php if($bddp_options[ 'en_tz']=="-11" ) { echo " selected"; } ?>>GMT -11</option>
									<option value="-10" <?php if($bddp_options[ 'en_tz']=="-10" ) { echo " selected"; } ?>>GMT -10</option>
									<option value="-9" <?php if($bddp_options[ 'en_tz']=="-9" ) { echo " selected"; } ?>>GMT -9</option>
									<option value="-8" <?php if($bddp_options[ 'en_tz']=="-8" ) { echo " selected"; } ?>>GMT -8</option>
									<option value="-7" <?php if($bddp_options[ 'en_tz']=="-7" ) { echo " selected"; } ?>>GMT -7</option>
									<option value="-6" <?php if($bddp_options[ 'en_tz']=="-6" ) { echo " selected"; } ?>>GMT -6</option>
									<option value="-5" <?php if($bddp_options[ 'en_tz']=="-5" ) { echo " selected"; } ?>>GMT -5</option>
									<option value="-4.5" <?php if($bddp_options[ 'en_tz']=="-4.5" ) { echo " selected"; } ?>>GMT -4:30</option>
									<option value="-4" <?php if($bddp_options[ 'en_tz']=="-4" ) { echo " selected"; } ?>>GMT -4</option>
									<option value="-3.5" <?php if($bddp_options[ 'en_tz']=="-3.5" ) { echo " selected"; } ?>>GMT -3:30</option>
									<option value="-3" <?php if($bddp_options[ 'en_tz']=="-3" ) { echo " selected"; } ?>>GMT -3</option>
									<option value="-2" <?php if($bddp_options[ 'en_tz']=="-2" ) { echo " selected"; } ?>>GMT -2</option>
									<option value="-1" <?php if($bddp_options[ 'en_tz']=="-1" ) { echo " selected"; } ?>>GMT -1</option>
									<option value="0" <?php if($bddp_options[ 'en_tz']=="0" ) { echo " selected"; } ?>>GMT 0</option>
									<option value="1" <?php if($bddp_options[ 'en_tz']=="1" ) { echo " selected"; } ?>>GMT +1</option>
									<option value="2" <?php if($bddp_options[ 'en_tz']=="2" ) { echo " selected"; } ?>>GMT +2</option>
									<option value="3" <?php if($bddp_options[ 'en_tz']=="3" ) { echo " selected"; } ?>>GMT +3</option>
									<option value="3.5" <?php if($bddp_options[ 'en_tz']=="3.5" ) { echo " selected"; } ?>>GMT +3:30</option>
									<option value="4" <?php if($bddp_options[ 'en_tz']=="4" ) { echo " selected"; } ?>>GMT +4</option>
									<option value="4.5" <?php if($bddp_options[ 'en_tz']=="4.5" ) { echo " selected"; } ?>>GMT +4:30</option>
									<option value="5" <?php if($bddp_options[ 'en_tz']=="5" ) { echo " selected"; } ?>>GMT +5</option>
									<option value="5.5" <?php if($bddp_options[ 'en_tz']=="5.5" ) { echo " selected"; } ?>>GMT +5:30</option>
									<option value="5.75" <?php if($bddp_options[ 'en_tz']=="5.75" ) { echo " selected"; } ?>>GMT +5:45</option>
									<option value="6" <?php if($bddp_options[ 'en_tz']=="6" ) { echo " selected"; } ?>>GMT +6</option>
									<option value="6.5" <?php if($bddp_options[ 'en_tz']=="6.5" ) { echo " selected"; } ?>>GMT +6:30</option>
									<option value="7" <?php if($bddp_options[ 'en_tz']=="7" ) { echo " selected"; } ?>>GMT +7</option>
									<option value="8" <?php if($bddp_options[ 'en_tz']=="8" ) { echo " selected"; } ?>>GMT +8</option>
									<option value="9" <?php if($bddp_options[ 'en_tz']=="9" ) { echo " selected"; } ?>>GMT +9</option>
									<option value="9.5" <?php if($bddp_options[ 'en_tz']=="9.5" ) { echo " selected"; } ?>>GMT +9:30</option>
									<option value="10" <?php if($bddp_options[ 'en_tz']=="10" ) { echo " selected"; } ?>>GMT +10</option>
									<option value="10.5" <?php if($bddp_options[ 'en_tz']=="10.5" ) { echo " selected"; } ?>>GMT +10:30</option>
									<option value="11" <?php if($bddp_options[ 'en_tz']=="11" ) { echo " selected"; } ?>>GMT +11</option>
									<option value="12" <?php if($bddp_options[ 'en_tz']=="12" ) { echo " selected"; } ?>>GMT +12</option>
									<option value="13" <?php if($bddp_options[ 'en_tz']=="13" ) { echo " selected"; } ?>>GMT +13</option>
								</select>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle" style="padding: 10px; margin: 0;"><span>Bangla Date Settings</span></h3>
				<div class="inside">
					<p align="justify">Choose when everyday the date (single line bangla date only, not calendar widget) will change... 6 AM (morning) or 12 AM (midnight)</p>

					<table class="form-table">
						<tr valign="top">
							<th scope="row"><label for="dt_change">When the date will change?</label>
							</th>
							<td>
								<select id="dt_change" name="bddp_options[dt_change]">
									<option value="6" <?php if($bddp_options[ 'dt_change']=="6" ) { echo " selected"; } ?>>06:00 AM (Morning)</option>
									<option value="0" <?php if($bddp_options[ 'dt_change']=="0" ) { echo " selected"; } ?>>12:00 AM (Midnight)</option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="bn_tz">Time Zone:</label>
							</th>
							<td>
								<select id="bn_tz" name="bddp_options[bangla_tz]">
									<option value="5.5" <?php if($bddp_options[ 'bangla_tz']=="5.5" ) { echo " selected"; } ?>>GMT +5:30 (India)</option>
									<option value="6" <?php if($bddp_options[ 'bangla_tz']=="6" ) { echo " selected"; } ?>>GMT +6 (Bangladesh)</option>
								</select>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle" style="padding: 10px; margin: 0;"><span>Hijri Date Settings</span></h3>
				<div class="inside">
					<p align="justify">Hijri month can have 29 or 30 days depending on the visibility of the moon. Adjust it manually. For example, if you want to minus two days, input -48 hours and Save Changes.</p>

					<table class="form-table">
						<tr valign="top">
							<th scope="row"><label for="bddp_options[hijri_tz]">Time Zone:</label>
							</th>
							<td>
								<select id="" name="" disabled="disabled">
									<option value="" selected="selected">Server Default</option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="bddp_options[hijri_adjust]">Plus/Minus Time (Hours):</label>
							</th>
							<td><input maxlength="3" type="text" id="bddp_options[hijri_adjust]" name="bddp_options[hijri_adjust]" size="3" value="<?php echo $bddp_options['hijri_adjust']; ?>"> (Example: -12, +23 etc.)</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle" style="padding: 10px; margin: 0;"><span>Date Formatting</span></h3>
				<div class="inside">
					<p align="justify">Choose Bangla/Gregorian/Hijri date output format.</p>

					<table class="form-table">
						<tr valign="top">
							<th scope="row">Date separator:</th>
							<td>
								<p><input type="radio" id="sep1" name="bddp_options[separator]" value=", " <?php if($bddp_options[ 'separator']==", " ) { echo " checked"; } ?>> <label for="sep1">Comma</label>
								</p>
								<p><input type="radio" id="sep2" name="bddp_options[separator]" value=" " <?php if($bddp_options[ 'separator']==" " ) { echo " checked"; } ?>> <label for="sep2">Space</label>
								</p>
							</td>
							<td></td>
						</tr>
						<tr valign="top">
							<th scope="row">Show:</th>
							<td>
								<p><input type="checkbox" id="bddp_options[ord_suffix]" name="bddp_options[ord_suffix]" value="1" <?php if($bddp_options[ 'ord_suffix']==1) echo( 'checked="checked"'); ?>/><label for="bddp_options[ord_suffix]">Ordinal suffix <span style="color:green;">(Eg. ১লা, ২রা)</span></label>
								</p>
								<p><input type="checkbox" id="bddp_options[last_word]" name="bddp_options[last_word]" value="1" <?php if($bddp_options[ 'last_word']==1) echo( 'checked="checked"'); ?>/><label for="bddp_options[last_word]">Last word <span style="color:green;">(Eg. খ্রিস্টাব্দ/বঙ্গাব্দ/হিজরী)</span></label>
								</p>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<?php submit_button(); ?>
		</form>


		<form method="post" action="options.php">
			<?php settings_fields( 'bddp-settings-group' ); ?>

			<input type="hidden" name="restore_defaults" value="1">
			<input type="submit" value="Restore Default Settings" class="button button-secondary">
		</form>
		<br/>

		<a name="how_to_use"></a>
		<div class="postbox">
			<h3 class="hndle" style="padding: 10px; margin: 0;"><span>How to use?</span></h3>
			<div class="inside">
				<p><strong>Go to: Appearance > <a href="<?php admin_url(); ?>widgets.php">Widgets</a> to use following widgets:</strong>
				</p>
				<ul style="list-style-type: square; margin-left: 10px;">
					<li>Bangla Date Display</li>
				</ul>

				<hr/>

				<p><strong>OR, Use following shortcodes:</strong>
				</p>
				<table style="border-collapse:collapse;" width="100%">
					<tr>
						<th style="border: 1px solid silver; background-color: #CCC;">Item</th>
						<th style="border: 1px solid silver; background-color: #CCC;">Shortcode</th>
						<th style="border: 1px solid silver; background-color: #CCC;">PHP Code</th>
					</tr>
					<tr>
						<td style="border: 1px solid silver; padding-left: 5px;">Bangla date:</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB"> &#91;bangla_date&#93;</span></span></code>
						</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB">   &#60;&#63;php echo do_shortcode&#40;&#39;&#91;bangla_date&#93;&#39;&#41;; </span><span style="color: #0000BB">&#63;&#62;</span></span>
</code>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid silver; padding-left: 5px;">Gregorian date:</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB"> &#91;english_date&#93;</span></span></code>
						</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB">   &#60;&#63;php echo do_shortcode&#40;&#39;&#91;english_date&#93;&#39;&#41;; </span><span style="color: #0000BB">&#63;&#62;</span></span>
</code>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid silver; padding-left: 5px;">Hijri date:</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB"> &#91;hijri_date&#93;</span></span></code>
						</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB">   &#60;&#63;php echo do_shortcode&#40;&#39;&#91;hijri_date&#93;&#39;&#41;; </span><span style="color: #0000BB">&#63;&#62;</span></span>
</code>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid silver; padding-left: 5px;">Current time:</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB"> &#91;bangla_time&#93;</span></span></code>
						</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB">   &#60;&#63;php echo do_shortcode&#40;&#39;&#91;bangla_time&#93;&#39;&#41;; </span><span style="color: #0000BB">&#63;&#62;</span></span>
</code>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid silver; padding-left: 5px;">Day name:</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB"> &#91;bangla_day&#93;</span></span></code>
						</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB">   &#60;&#63;php echo do_shortcode&#40;&#39;&#91;bangla_day&#93;&#39;&#41;; </span><span style="color: #0000BB">&#63;&#62;</span></span>
</code>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid silver; padding-left: 5px;">Season name:</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB"> &#91;bangla_season&#93;</span></span></code>
						</td>
						<td style="border: 1px solid silver; padding-left: 5px;"><code><span style="color: #000000"><span style="color: #0000BB">   &#60;&#63;php echo do_shortcode&#40;&#39;&#91;bangla_season&#93;&#39;&#41;; </span><span style="color: #0000BB">&#63;&#62;</span></span>
</code>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<a name="credits"></a>
		<div class="postbox">
			<h3 class="hndle" style="padding: 10px; margin: 0;"><span>Credits</span></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<td>
							<p><a href="http://facebook.com/imran2w" target="_blank"><img src="http://www.gravatar.com/avatar/<?php echo md5( "imran2w@gmail.com" ); ?>" /></a>
							</p>
							<p>Developer: <a href="http://facebook.com/imran2w">M.A. IMRAN</a><br/> E-Mail: imran2w@gmail.com<br/> Web: <a href="http://i-onlinemedia.net">www.i-onlinemedia.net</a> - <a href="http://xhostbd.com">www.xhostbd.com</a>
							</p><br/>
							<p align="justify">This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or ( at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of ERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the <a href="http://www.gnu.org/licenses/gpl.txt">GNU General Public License</a> for more details.</p>
						</td>
						<td>
							<div id="fb-root"></div>
							<script>
								( function ( d, s, id ) {
									var js, fjs = d.getElementsByTagName( s )[ 0 ];
									if ( d.getElementById( id ) ) return;
									js = d.createElement( s );
									js.id = id;
									js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=330291150372591&version=v2.0";
									fjs.parentNode.insertBefore( js, fjs );
								}( document, 'script', 'facebook-jssdk' ) );
							</script>

							<div class="fb-like-box" data-href="https://www.facebook.com/xhostbd" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
						</td>
						<td>
							<div id="fb-root"></div>
							<script>
								( function ( d, s, id ) {
									var js, fjs = d.getElementsByTagName( s )[ 0 ];
									if ( d.getElementById( id ) ) return;
									js = d.createElement( s );
									js.id = id;
									js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=330291150372591&version=v2.0";
									fjs.parentNode.insertBefore( js, fjs );
								}( document, 'script', 'facebook-jssdk' ) );
							</script>

							<div class="fb-like-box" data-href="https://www.facebook.com/islamiconlinemedia" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
						</td>
					</tr>
				</table>
			</div>
		</div>

	</div>

	<?php
	}


	//Contextual Help Menu --------------------------------------
	function bddp_help( $contextual_help, $screen_id, $screen ) {

		global $bddp_hook;
		if ( $screen_id == $bddp_hook ) {

			$contextual_help = 'For any help related to this plugin, contact <a href="http://facebook.com/imran2w" target="_blank">M.A. IMRAN</a>.<br/>E-Mail: imran2w@gmail.com<br/>Web: <a href="http://i-onlinemedia.net" target="_blank">www.i-onlinemedia.net</a><br/>View: <a href="http://wordpress.org/support/plugin/bangla-date-display" target="_blank">Support Forum</a> | <a href="http://wordpress.org/plugins/bangla-date-display/changelog/" target="_blank">Changelog</a><br/>Wordpress Plugins Directory: <a href="http://wordpress.org/plugins/bangla-date-display" target="_blank">http://wordpress.org/plugins/bangla-date-display</a><br/><span style="color: red;">Please always keep this plugin up to date.</span>';
		}
		return $contextual_help;
	}


	function bddp_admin() {

		global $bddp_hook;
		$bddp_hook = add_options_page( 'Bangla Date Display Settings', 'Bangla Date Display', 'activate_plugins', 'bangla-date-display', 'bddp_options_page' );
	}

	// Register settings --------------------------------

	function register_bddp_settings() {
		register_setting( 'bddp-settings-group', 'bddp_options' );
	}


	add_action( 'admin_menu', 'bddp_admin' );
	add_action( 'admin_init', 'register_bddp_settings' );
	add_filter( 'contextual_help', 'bddp_help', 10, 3 );

	?>