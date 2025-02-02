<?php
/*******************************
Admin Scripts
 ********************************/
add_action('admin_menu', 'csanalytics_theme_page');
function csanalytics_theme_page() {
    if (count($_POST) > 0 && isset($_POST['csanalytics_settings'])) {
        $options = array(
            'dev_industry',
            'dev_email',
            'dev_key',
            'dev_profile',
            'dev_tag_mgr',
            'dev_tag_mgr_footer',
            'speed_enable',
            'adwords_enable',
            'dev_adwords_url',
            'dev_social_url',
            'dev_conv_profile',
            'dev_conv_script',
            'dev_heatmap_script',
            'dev_heatmap_page',
            'dev_web_rank',
            'dev_web_rank_url',
            'dev_keyword_rank',
            'dev_client_payment_type',
            'dev_client_monthly',
            'dev_client_perlead',
            'dev_chat',
            'dev_calls',
            'dev_citations',
            'dev_bl_citations',
            'dev_bl_reviews',
            'dev_citations',
            'weather_enable',
            'weather_api',
            'weather_zip',
            'dev_ontraport_enable',
            'dev_ontraport_clientkey',
            'dev_ontraport_apikey',
            'dev_ontraport_appid',
            'dev_servicetitan_apikey',
        );

        foreach ($options as $opt) {
            delete_option('gapi_' . $opt, $_POST[$opt]);
            add_option('gapi_' . $opt, $_POST[$opt]);
        }
    }

    if (count($_POST) > 0 && isset($_POST['gapi_date_settings'])) {
        $options = array(
            'calendar_start',
            'calendar_end',
            'calendar_diff',
        );

        foreach ($options as $opt) {
            delete_option('gapi_' . $opt, $_POST[$opt]);
            add_option('gapi_' . $opt, $_POST[$opt]);
        }
    }

    if (count($_POST) > 0 && isset($_POST['gapi_override_settings'])) {
        $options = array(
            'dev_industry_other',
            'lead_appt',
            'appt_sale',
            'rep_percent',
            'inst_percent',
            'rep_avg_tix',
            'inst_avg_tix',

        );

        foreach ($options as $opt) {
            delete_option('gapi_' . $opt, $_POST[$opt]);
            add_option('gapi_' . $opt, $_POST[$opt]);
        }
    }

    if (count($_POST) > 0 && isset($_POST['gapi_segment_settings'])) {
        $options = array(
            'industry_business_unit',

        );

        foreach ($options as $opt) {
            delete_option('gapi_' . $opt, $_POST[$opt]);
            add_option('gapi_' . $opt, $_POST[$opt]);
        }
    }

    if (count($_POST) > 0 && isset($_POST['gapi_metrics_dimensions'])) {
        $options = array(
            'primary_dimension',
            'secondary_dimension',
            'max_results',

        );

        foreach ($options as $opt) {
            delete_option('gapi_' . $opt, $_POST[$opt]);
            add_option('gapi_' . $opt, $_POST[$opt]);
        }
    }

    if (count($_POST) > 0 && isset($_POST['gapi_adwords_metrics_dimensions'])) {
        $options = array(
            'adw_primary_dimension',
            'adw_secondary_dimension',
            'adw_max_results',

        );

        foreach ($options as $opt) {
            delete_option('gapi_' . $opt, $_POST[$opt]);
            add_option('gapi_' . $opt, $_POST[$opt]);
        }
    }

    if (count($_POST) > 0 && isset($_POST['gapi_speed_metrics_dimensions'])) {
        $options = array(
            'speed_primary_dimension',
            'speed_secondary_dimension',
            'speed_max_results',

        );

        foreach ($options as $opt) {
            delete_option('gapi_' . $opt, $_POST[$opt]);
            add_option('gapi_' . $opt, $_POST[$opt]);
        }
    }

    if (count($_POST) > 0 && isset($_POST['gapi_ontraport_campaign_options'])) {
        $options = array(
            'dev_campaign_group',
            'dev_campaign_group_name',

        );

        foreach ($options as $opt) {
            delete_option('gapi_' . $opt, $_POST[$opt]);
            add_option('gapi_' . $opt, $_POST[$opt]);
        }
    }

    if (count($_POST) > 0 && isset($_POST['gapi_st_sort_data'])) {
        $options = array(
            'dev_st_campaign_group',
            'dev_st_campaign_group_name',
            'st_max_results',

        );

        foreach ($options as $opt) {
            delete_option('gapi_' . $opt, $_POST[$opt]);
            add_option('gapi_' . $opt, $_POST[$opt]);
        }
    }

    add_menu_page('CSAnalytics', 'CSAnalytics', 'edit_pages', 'csanalytics-panel', 'csanalytics_panel', '', 3);
    add_submenu_page('csanalytics-panel', 'Analytics Settings', 'Settings', 'edit_users', 'csanalytics-settings', 'csanalytics_settings');

}
?>