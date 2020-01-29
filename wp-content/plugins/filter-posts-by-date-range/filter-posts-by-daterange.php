<?php 

class FPBDR_DateRange{
	
	function __construct(){
 
		// include CSS/JS, in our case jQuery UI datepicker
		add_action( 'admin_enqueue_scripts', array( $this, 'FPBDR_jqueryui' ) );
 
		// HTML of the filter
		add_action( 'restrict_manage_posts', array( $this, 'FPBDR_form' ) );
 
		// the function that filters posts
		add_action( 'pre_get_posts', array( $this, 'FPBDR_filterquery' ) );
 
	}
 
	function FPBDR_jqueryui() {
        
		$wp_scripts = wp_scripts();
        
        wp_enqueue_style( 'FPBDR-admin-ui-css', FPBDR_PLUGIN_URL . '/css/jquery-ui.css', false, false, false );
		wp_enqueue_script( 'jquery-ui-datepicker' );
	}
 
	function FPBDR_form() {
        
		$this_year      = date('Y');
		$this_year_text = 'yearRange: "'.$this_year - 50 .':'.$this_year.'"';
        
        $FPBDR_DateFrom = sanitize_text_field( $_GET['FPBDR_DateFrom'] );
        $FPBDR_DateTo   = sanitize_text_field( $_GET['FPBDR_DateTo'] );
		
		$from   = ( isset( $FPBDR_DateFrom ) && $FPBDR_DateFrom ) ? $FPBDR_DateFrom : '';
		$to     = ( isset( $FPBDR_DateTo ) && $FPBDR_DateTo ) ? $FPBDR_DateTo : '';
        
        wp_enqueue_style( 'FPBDR-admin-ui-css', FPBDR_PLUGIN_URL . '/css/jquery-ui.css', false, false, false );

		echo '
		<style>
		input[name="FPBDR_DateFrom"], input[name="FPBDR_DateTo"]{
			line-height: 28px;
			height: 28px;
			margin: 0;
			width:125px;
		}
		</style>
 
		<input autocomplete="off" type="text" name="FPBDR_DateFrom" placeholder="Date From" value="' . $from . '" />
		<input autocomplete="off" type="text" name="FPBDR_DateTo" placeholder="Date To" value="' . $to . '" />
 
		<script>
		jQuery( function($) {
			var from = $(\'input[name="FPBDR_DateFrom"]\'),
			    to = $(\'input[name="FPBDR_DateTo"]\');
 
			$( \'input[name="FPBDR_DateFrom"], input[name="FPBDR_DateTo"]\' ).datepicker({ changeMonth: true, changeYear: true, yearRange: "-15:+0",});
			// by default, the dates look like this "April 3, 2017" but you can use any strtotime()-acceptable date format
    			// to make it 2017-04-03, add this - datepicker({dateFormat : "yy-mm-dd"});
 
 
    			// the rest part of the script prevents from choosing incorrect date interval
    			from.on( \'change\', function() {
				to.datepicker( \'option\', \'minDate\', from.val() );
			});
 
			to.on( \'change\', function() {
				from.datepicker( \'option\', \'maxDate\', to.val() );
			});
 
		});
		</script>';
 
	}
 
	/*
	 * The main function that actually filters the posts is here
	 */
	function FPBDR_filterquery( $admin_query ) {
        
		global $pagenow;
        
        $FPBDR_DateFrom = sanitize_text_field( $_GET['FPBDR_DateFrom'] );
        $FPBDR_DateTo   = sanitize_text_field( $_GET['FPBDR_DateTo'] );
        
        if ( $admin_query->is_main_query() && is_admin()
            
            // by default filter will be added to all post types, you can also operate with $_GET['post_type'] to restrict it for some types
            
			&& in_array( $pagenow, array( 'edit.php', 'upload.php' ) ) && ( ! empty( $FPBDR_DateFrom ) || ! empty( $FPBDR_DateTo ) ) ) {
            
            if( $FPBDR_DateFrom == $FPBDR_DateTo ) {
                
                $getDate =  explode( "-" , date('Y-m-d' , strtotime( $FPBDR_DateFrom ) ) );
                
                $admin_query->set(  'date_query', array(    'year'  => $getDate[0] ,
                                                            'month' => $getDate[1] ,
                                                            'day'   => $getDate[2] ) );
                
            } else {
                
                $admin_query->set(  'date_query', array(    'after'     => $FPBDR_DateFrom ,  // any strtotime()-acceptable format!
                                                            'before'    => $FPBDR_DateTo ,
                                                            'inclusive' => true ,      // include the selected days as well
                                                            'column'    => 'post_date' // 'post_modified', 'post_date_gmt', 'post_modified_gmt' 
                                                        ) );
                
            }
 
		}
 
		return $admin_query;
 
	}
 
}

?>