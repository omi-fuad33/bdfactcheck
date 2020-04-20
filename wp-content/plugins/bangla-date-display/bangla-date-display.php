<?php
/*
Plugin Name: Bangla Date Display
Plugin URI: http://i-onlinemedia.net/
Description: Displays Bangla, Gregorian and Hijri date in bangla language via widgets and shortcodes! Options for displaying post/page's time, date, comment count, archive calendar etc in Bangla language.
Author: M.A. IMRAN
Version: 8.9.1
Author URI: http://facebook.com/imran2w
*/

/*
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or ( at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of ERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA. Online: http://www.gnu.org/licenses/gpl.txt;
*/

// Bismillah...

defined( 'ABSPATH' )or die( 'Stop! You can not do this!' );
//ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED); // disable php warnings, notices

$bddp_options = get_option( "bddp_options" );
if ( !is_array( $bddp_options ) ) {
	$bddp_options = array(
		'cal_wgt' => '0',
		'trans_dt' => '0',
		'trans_cmnt' => '0',
		'trans_num' => '0',
		'trans_cal' => '0' );
}


require 'translator.php';
require 'class.banglaDate.php';
require 'ajax-archive-calendar.php';

if ( !class_exists( 'uCal' ) ) {
	include_once( 'uCal.php' );
}

function bddp_bangla_time() {

	$bddp_options = get_option( "bddp_options" );
	if ( !is_array( $bddp_options ) ) {
		$bddp_options = array( 'en_tz' => '6' );
	}

	$offset = $bddp_options[ 'en_tz' ] * 60 * 60; //converting hours to seconds.
	$hour = gmdate( "G", time() + $offset );

	ob_start(); // begin output buffering

	if ( $hour >= 5 && $hour <= 5 ) {
		$ddd = "ভোর ";
	} else if ( $hour >= 6 && $hour <= 11 ) {
		$ddd = "সকাল ";
	} else if ( $hour >= 12 && $hour <= 14 ) {
		$ddd = "দুপুর ";
	} else if ( $hour >= 15 && $hour <= 17 ) {
		$ddd = "বিকাল ";
	} else if ( $hour >= 18 && $hour <= 19 ) {
		$ddd = "সন্ধ্যা ";
	} else {
		$ddd = "রাত ";
	}

	printf( '%s', $ddd . ' ' . en_to_bn( gmdate( "g:i", time() + $offset ) ) );

	$output = ob_get_contents(); // end output buffering
	ob_end_clean(); // grab the buffer contents and empty the buffer
	return $output;
}


function bddp_bn_day() {
	$bddp_options = get_option( "bddp_options" );
	if ( !is_array( $bddp_options ) ) {
		$bddp_options = array( 'en_tz' => '6' );
	}

	$str = en_to_bn( gmdate( "l", time() + $bddp_options[ 'en_tz' ] * 60 * 60 ) );
	return $str;
}

function bddp_bangla_date() {

	$bddp_options = get_option( "bddp_options" );
	if ( !is_array( $bddp_options ) ) {
		$bddp_options = array( 'dt_change' => '0', 'separator' => ', ', 'last_word' => '1', 'ord_suffix' => '1' );
	}
	if ( $bddp_options[ 'last_word' ] == "1" ) {
		$last_word = " বঙ্গাব্দ";
	}

	$bn = new BanglaDate( time(), $bddp_options[ 'dt_change' ] );
	$bdtday = $bn->get_day();
	$bdtmy = $bn->get_month_year();

	$day = sprintf( '%s', implode( ' ', $bdtday ) );
	$month_year = sprintf( '%s', implode( $bddp_options[ 'separator' ], $bdtmy ) );

	$day_number = array( "১" => "১লা", "২" => "২রা", "৩" => "৩রা", "৪" => "৪ঠা", "৫" => "৫ই", "৬" => "৬ই", "৭" => "৭ই", "৮" => "৮ই", "৯" => "৯ই", "১০" => "১০ই", "১১" => "১১ই", "১২" => "১২ই", "১৩" => "১৩ই", "১৪" => "১৪ই", "১৫" => "১৫ই", "১৬" => "১৬ই", "১৭" => "১৭ই", "১৮" => "১৮ই", "১৯" => "১৯শে", "২০" => "২০শে", "২১" => "২১শে", "২২" => "২২শে", "২৩" => "২৩শে", "২৪" => "২৪শে", "২৫" => "২৫শে", "২৬" => "২৬শে", "২৭" => "২৭শে", "২৮" => "২৮শে", "২৯" => "২৯শে", "৩০" => "৩০শে", "৩১" => "৩১শে" );

	ob_start(); // begin output buffering

	if ( $bddp_options[ 'ord_suffix' ] == "1" ) {
		printf( '%s', $day_number[ $day ] . ' ' . $month_year . $last_word );
	} else {
		printf( $day . ' ' . $month_year . $last_word );
	}

	$output = ob_get_contents(); // end output buffering
	ob_end_clean(); // grab the buffer contents and empty the buffer
	return $output;
}


function bddp_bn_season() {
	$bddp_options = get_option( "bddp_options" );
	if ( !is_array( $bddp_options ) ) {
		$bddp_options = array( 'bangla_tz' => '6' );
	}

	$bn = new BanglaDate( time() + $bddp_options[ 'bangla_tz' ] * 60 * 60, 0 );
	$bdtmonth = $bn->get_month();
	$month = sprintf( '%s', implode( ' ', $bdtmonth ) );

	if ( $month == "বৈশাখ" || $month == "জ্যৈষ্ঠ" ) {
		return "গ্রীষ্মকাল";
	} elseif ( $month == "আষাঢ়" || $month == "শ্রাবণ" ) {
		return "বর্ষাকাল";
	}
	elseif ( $month == "ভাদ্র" || $month == "আশ্বিন" ) {
		return "শরৎকাল";
	}
	elseif ( $month == "কার্তিক" || $month == "অগ্রহায়ণ" ) {
		return "হেমন্তকাল";
	}
	elseif ( $month == "পৌষ" || $month == "মাঘ" ) {
		return "শীতকাল";
	}
	else {
		return "বসন্তকাল";
	}
}


function bddp_bn_en_date() {

	$bddp_options = get_option( "bddp_options" );
	if ( !is_array( $bddp_options ) ) {
		$bddp_options = array(
			'bangla_tz' => '6',
			'en_tz' => '6',
			'separator' => ', ',
			'last_word' => '1',
			'ord_suffix' => '1' );
	}

	if ( $bddp_options[ 'last_word' ] == "1" ) {
		$last_word = " ইং";
	}

	if ( $bddp_options[ 'ord_suffix' ] == "1" ) {
		$day_number = array( "1" => "১লা", "2" => "২রা", "3" => "৩রা", "4" => "৪ঠা", "5" => "৫ই", "6" => "৬ই", "7" => "৭ই", "8" => "৮ই", "9" => "৯ই", "10" => "১০ই", "11" => "১১ই", "12" => "১২ই", "13" => "১৩ই", "14" => "১৪ই", "15" => "১৫ই", "16" => "১৬ই", "17" => "১৭ই", "18" => "১৮ই", "19" => "১৯শে", "20" => "২০শে", "21" => "২১শে", "22" => "২২শে", "23" => "২৩শে", "24" => "২৪শে", "25" => "২৫শে", "26" => "২৬শে", "27" => "২৭শে", "28" => "২৮শে", "29" => "২৯শে", "30" => "৩০শে", "31" => "৩১শে" );
	} elseif ( $bddp_options[ 'ord_suffix' ] == "" ) {
		$day_number = array( "1" => "১", "2" => "২", "3" => "৩", "4" => "৪", "5" => "৫", "6" => "৬", "7" => "৭", "8" => "৮", "9" => "৯", "10" => "১০", "11" => "১১", "12" => "১২", "13" => "১৩", "14" => "১৪", "15" => "১৫", "16" => "১৬", "17" => "১৭", "18" => "১৮", "19" => "১৯", "20" => "২০", "21" => "২১", "22" => "২২", "23" => "২৩", "24" => "২৪", "25" => "২৫", "26" => "২৬", "27" => "২৭", "28" => "২৮", "29" => "২৯", "30" => "৩০", "31" => "৩১" );
	}

	ob_start(); // begin output buffering

	$offset = $bddp_options[ 'en_tz' ] * 60 * 60;

	printf( '%s', $day_number[ gmdate( "j", time() + $offset ) ] . " " . en_to_bn( gmdate( "F", time() + $offset ) ) . $bddp_options[ 'separator' ] . en_to_bn( gmdate( "Y", time() + $offset ) ) . $last_word );
	$output = ob_get_contents(); // end output buffering
	ob_end_clean(); // grab the buffer contents and empty the buffer
	return $output;
}

function bddp_bn_hijri_date() {

	$bddp_options = get_option( "bddp_options" );
	if ( !is_array( $bddp_options ) ) {
		$bddp_options = array(
			'hijri_adjust' => '-0',
			'separator' => ', ',
			'last_word' => '1',
			'ord_suffix' => '1' );
	}

	if ( $bddp_options[ 'last_word' ] == "1" ) {
		$last_word = " হিজরী";
	}

	$offset = $bddp_options[ 'hijri_adjust' ] * 60 * 60;

	$d = new uCal;

	if ( $bddp_options[ 'ord_suffix' ] == "1" ) {
		$day_number = array( "1" => "১লা", "2" => "২রা", "3" => "৩রা", "4" => "৪ঠা", "5" => "৫ই", "6" => "৬ই", "7" => "৭ই", "8" => "৮ই", "9" => "৯ই", "10" => "১০ই", "11" => "১১ই", "12" => "১২ই", "13" => "১৩ই", "14" => "১৪ই", "15" => "১৫ই", "16" => "১৬ই", "17" => "১৭ই", "18" => "১৮ই", "19" => "১৯শে", "20" => "২০শে", "21" => "২১শে", "22" => "২২শে", "23" => "২৩শে", "24" => "২৪শে", "25" => "২৫শে", "26" => "২৬শে", "27" => "২৭শে", "28" => "২৮শে", "29" => "২৯শে", "30" => "৩০শে", "31" => "৩১শে" );
	} elseif ( $bddp_options[ 'ord_suffix' ] == "" ) {
		$day_number = array( "1" => "১", "2" => "২", "3" => "৩", "4" => "৪", "5" => "৫", "6" => "৬", "7" => "৭", "8" => "৮", "9" => "৯", "10" => "১০", "11" => "১১", "12" => "১২", "13" => "১৩", "14" => "১৪", "15" => "১৫", "16" => "১৬", "17" => "১৭", "18" => "১৮", "19" => "১৯", "20" => "২০", "21" => "২১", "22" => "২২", "23" => "২৩", "24" => "২৪", "25" => "২৫", "26" => "২৬", "27" => "২৭", "28" => "২৮", "29" => "২৯", "30" => "৩০", "31" => "৩১" );
	}

	$month_name = array( "Muh" => "মুহাররম", "Saf" => "সফর", "Rb1" => "রবিউল-আউয়াল", "Rb2" => "রবিউস-সানি", "Jm1" => "জমাদিউল-আউয়াল", "Jm2" => "জমাদিউস-সানি", "Raj" => "রজব", "Shb" => "শাবান", "Rmd" => "রমযান", "Shw" => "শাওয়াল", "DhQ" => "জিলক্বদ", "DhH" => "জিলহজ্জ" );
	ob_start(); // begin output buffering

	printf( '%s', $day_number[ $d->date( "j", time() + $offset ) ] . " " . $month_name[ $d->date( "M", time() + $offset ) ] . $bddp_options[ 'separator' ] . en_to_bn( $d->date( "Y", time() + $offset ) ) . $last_word );

	$output = ob_get_contents(); // end output buffering
	ob_end_clean(); // grab the buffer contents and empty the buffer
	return $output;
}


//================== Widget 01 ========================

function widget_bangla_date_display( $args ) {
	extract( $args );

	$bddp_wgt1 = get_option( "bddp_wgt1" );
	if ( !is_array( $bddp_wgt1 ) ) {
		$bddp_wgt1 = array(
			'title' => 'আজকের দিন-তারিখ',
			'day' => '1',
			'time' => '1',
			'en_date' => '1',
			'hijri_date' => '1',
			'bn_date' => '1',
			'season' => '1' );
	}

	echo $before_widget;
	echo $before_title . $bddp_wgt1[ 'title' ] . $after_title;
	echo "<ul>";
	if ( $bddp_wgt1[ 'day' ] == "1" || $bddp_wgt1[ 'time' ] == "1" ) {
		echo "<li>";
	}
	if ( $bddp_wgt1[ 'day' ] == "1" ) {
		echo do_shortcode( '[bangla_day]' );
	}
	if ( $bddp_wgt1[ 'time' ] == "1" ) {
		echo " ( ";
		echo do_shortcode( '[bangla_time]' );
		echo " )";
	}
	if ( $bddp_wgt1[ 'day' ] == "1" || $bddp_wgt1[ 'show_time' ] == "1" ) {
		echo "</li>";
	}
	if ( $bddp_wgt1[ 'en_date' ] == "1" ) {
		echo "<li>";
		echo do_shortcode( '[english_date]' );
		echo "</li>";
	}
	if ( $bddp_wgt1[ 'hijri_date' ] == "1" ) {
		echo "<li>";
		echo do_shortcode( '[hijri_date]' );
		echo "</li>";
	}
	if ( $bddp_wgt1[ 'bn_date' ] == "1" || $bddp_wgt1[ 'show_season' ] == "1" ) {
		echo "<li>";
	}
	if ( $bddp_wgt1[ 'bn_date' ] == "1" ) {
		echo do_shortcode( '[bangla_date]' );
	}
	if ( $bddp_wgt1[ 'season' ] == "1" ) {
		echo " ( ";
		echo do_shortcode( '[bangla_season]' );
		echo " )";
	}
	?>
	<?php
	if ( $bddp_wgt1[ 'bn_date' ] == "1" || $bddp_wgt1[ 'season' ] == "1" ) {
		echo "</li>";
	}
	echo "</ul>";
	echo $after_widget;
}

function bddp_wgt1_control() {
	$bddp_wgt1 = get_option( "bddp_wgt1" );
	if ( !is_array( $bddp_wgt1 ) ) {
		$bddp_wgt1 = array(
			'title' => 'আজকের দিন-তারিখ',
			'day' => '1',
			'time' => '1',
			'en_date' => '1',
			'hijri_date' => '1',
			'bn_date' => '1',
			'season' => '1' );
	}

	if ( isset( $_POST[ 'widget_control_submit' ] ) ) {
		$bddp_wgt1[ 'title' ] = htmlspecialchars( $_POST[ 'title' ] );
		$bddp_wgt1[ 'day' ] = htmlspecialchars( $_POST[ 'day' ] );
		$bddp_wgt1[ 'time' ] = htmlspecialchars( $_POST[ 'time' ] );
		$bddp_wgt1[ 'en_date' ] = htmlspecialchars( $_POST[ 'en_date' ] );
		$bddp_wgt1[ 'hijri_date' ] = htmlspecialchars( $_POST[ 'hijri_date' ] );
		$bddp_wgt1[ 'bn_date' ] = htmlspecialchars( $_POST[ 'bn_date' ] );
		$bddp_wgt1[ 'season' ] = htmlspecialchars( $_POST[ 'season' ] );
		update_option( "bddp_wgt1", $bddp_wgt1 );
	}
	?>

	<p>
		<table width="100%">
			<tr>
				<td> <label for="title">Title: </label>
				</td>
				<td><input type="text" id="title" name="title" value="<?php echo $bddp_wgt1['title'];?>"/> </td>
			</tr>

			<tr>
				<td>Show:</td>
				<td><input type="checkbox" id="day" name="day" value="1" <?php if($bddp_wgt1[ 'day']==1) echo( 'checked="checked"'); ?>/><label for="day">Day</label>
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="checkbox" id="time" name="time" value="1" <?php if($bddp_wgt1[ 'time']==1) echo( 'checked="checked"'); ?>/><label for="time">Time</label>
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="checkbox" id="en_date" name="en_date" value="1" <?php if($bddp_wgt1[ 'en_date']==1) echo( 'checked="checked"'); ?>/><label for="en_date">Gregorian Date</label>
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="checkbox" id="hijri_date" name="hijri_date" value="1" <?php if($bddp_wgt1[ 'hijri_date']==1) echo( 'checked="checked"'); ?>/><label for="hijri_date">Hijri Date</label>
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="checkbox" id="bn_date" name="bn_date" value="1" <?php if($bddp_wgt1[ 'bn_date']==1) echo( 'checked="checked"'); ?>/><label for="bn_date">Bangla Date</label>
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="checkbox" id="season" name="season" value="1" <?php if($bddp_wgt1[ 'season']==1) echo( 'checked="checked"'); ?>/><label for="season">Season Name</label>
				</td>
			</tr>
		</table>

		<input type="hidden" id="widget_control_submit" name="widget_control_submit" value="1"/>
	</p>
	<p><span style="color: gray;">Go to: Settings > <a href="<?php admin_url(); ?>options-general.php?page=bangla-date-display">Bangla Date Display</a> to change plugin settings.</span>
	</p>
	<?php
}

// ========== Action Links =================

function bddp_action_links( $links ) {
	$links[] = '<a href="' . get_admin_url( null, 'options-general.php?page=bangla-date-display' ) . '">Settings</a>';
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'bddp_action_links' );

//====================================

wp_register_sidebar_widget( 'bangla_date_display', 'Bangla Date Display', 'widget_bangla_date_display', array( 'description' => __( 'Displays Bangla, Gregorian & Hijri date, time, day and season name.' ) ) );
wp_register_widget_control( 'bangla_date_display', 'Bangla Date Display', 'bddp_wgt1_control' );

add_shortcode( 'bangla_time', 'bddp_bangla_time' );
add_shortcode( 'bangla_day', 'bddp_bn_day' );
add_shortcode( 'bangla_date', 'bddp_bangla_date' );
add_shortcode( 'bangla_season', 'bddp_bn_season' );
add_shortcode( 'english_date', 'bddp_bn_en_date' );
add_shortcode( 'hijri_date', 'bddp_bn_hijri_date' );

if ( is_admin() ) {
	include 'bddp_admin.php';
}

?>