<?php
/*
Plugin Name: CSAnalytics
Plugin URI: http://leadsnearby.com
Description: Plugin to display LeadsNearby Metrics
Version: 3.0
Author: LeadsNearby
Author URI: http://leadsnearby.com
License: GPLv2
*/

// Define Directory Constants
define('CSAnalytics_MAIN', plugin_dir_path( __FILE__ ));
define('CSAnalytics_LIB', CSAnalytics_MAIN . '/lib');
define('CSAnalytics_UPDATER', CSAnalytics_LIB . '/updater');
define('CSAnalytics_ADMIN', CSAnalytics_LIB . '/admin');
define('CSAnalytics_FUNCTIONS', CSAnalytics_LIB . '/functions');
define('CSAnalytics_INC', CSAnalytics_LIB . '/inc');

// Load Admin Scripts
require_once(CSAnalytics_ADMIN . '/admin-options.php');

// Load Admin Panel
require_once(CSAnalytics_ADMIN . '/admin-panel.php');

// Load Plugin Functions
require_once(CSAnalytics_FUNCTIONS . '/csanalytics-functions.php');

// Load Admin Settings
require_once(CSAnalytics_ADMIN . '/admin-settings.php');

// Load Admin Functions
require_once(CSAnalytics_ADMIN . '/admin-functions.php');

// Load External Functions
require_once(CSAnalytics_INC . '/functions.php');

require_once(CSAnalytics_UPDATER . '/github-updater.php' );
new GitHubPluginUpdater( __FILE__, 'LeadsNearby', 'csanalytics' );

?>