<?php

/*********************************
Theme Icon
*********************************/

function csanalytics_theme_icons() {
?>
	<style type="text/css">#adminmenu #toplevel_page_csanalytics-panel div.wp-menu-image:before { content: "\f239"; }</style>
<?php }

add_action( 'admin_head', 'csanalytics_theme_icons' );

?>