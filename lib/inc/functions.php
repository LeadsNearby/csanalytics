<?php
// CSAnalytics Scripts and Style
add_action('wp_enqueue_scripts', 'csanalytics_ext_scripts');
function csanalytics_ext_scripts() {
    if (!is_admin()) {
        wp_register_script('js-cookie', plugins_url('js/js-cookie.js', __FILE__), array(), null, true);
        wp_enqueue_script('js-cookie');
    }
}
// Google Tag Manager Scripts
add_action('wp_head', 'csanalytics_gtagmgr_script');
function csanalytics_gtagmgr_script() {
    $dev_tag_mgr = get_option('gapi_dev_tag_mgr');
    if ($dev_tag_mgr != "") {
        echo stripslashes($dev_tag_mgr);
    }
}
add_action('wp_footer', 'csanalytics_gtagmgr_script_footer');
function csanalytics_gtagmgr_script_footer() {
    $dev_tag_mgr_footer = get_option('gapi_dev_tag_mgr_footer');
    if ($dev_tag_mgr_footer != "") {
        echo stripslashes($dev_tag_mgr_footer);
    }
}

// Convirza DNI Scripts
add_action('wp_footer', 'csanalytics_dni_script');
function csanalytics_dni_script() {
    $dev_conv_profile = get_option('gapi_dev_conv_profile');
    $dev_conv_script = get_option('gapi_dev_conv_script');
    if ($dev_conv_profile != "" && $dev_conv_script != "") {
        wp_register_script('csanalytics-dni', 'https://dni.logmycalls.com/dni.js', array('js-cookie'), null, true);
        wp_enqueue_script('csanalytics-dni');
        echo stripslashes($dev_conv_script);

    }
}

// Heatmap DNI Scripts
add_action('wp_head', 'csanalytics_heatmap_script');
function csanalytics_heatmap_script() {
    $dev_heatmap_script = get_option('gapi_dev_heatmap_script');
    if ($dev_heatmap_script != "") {
        echo stripslashes($dev_heatmap_script);
    }
}
?>f