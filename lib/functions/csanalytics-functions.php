<?php
// CSAnalytics Scripts and Style
add_action('admin_enqueue_scripts', 'csanalytics_plugin_scripts');
function csanalytics_plugin_scripts()  {
	if (is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_register_script( 'jquery-cookie', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', false);
		wp_register_script('tablesorter', plugins_url('csanalytics/lib/functions/js/jquery.tablesorter.min.js'));	
		wp_enqueue_script('jquery-cookie');
		wp_enqueue_script('tablesorter');
		wp_enqueue_script('thickbox');
		wp_register_script('sortelements', plugins_url('csanalytics/lib/functions/js/sortelements.js'));		
		wp_enqueue_script('sortelements');
		wp_enqueue_media();
		/* Register Admin Styles */
		wp_enqueue_style( 'farbtastic' );
		wp_enqueue_style( 'thickbox' );	
		wp_register_style('reporting-styles', plugins_url('csanalytics/lib/functions/css/reporting-styles.css'), '', '1.0', false);
		wp_register_style('tablesorter-styles', plugins_url('csanalytics/lib/functions/css/table-sorter-styles.css'), '', '1.0', false);		
		wp_enqueue_style('reporting-styles'); 
		wp_enqueue_style('tablesorter-styles'); 		
	}		
}
?>