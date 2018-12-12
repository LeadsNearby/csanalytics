<?php
/*
 * Converts CSV to JSON
 * Example uses Google Spreadsheet CSV feed
 * csvToArray function I think I found on php.net
 */
 
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );;
 
header('Content-type: application/json');
// Set your CSV feed
$feed = get_option('gapi_dev_keyword_rank');

//$feed = 'https://www.hobaica.com/wp-content/plugins/csanalytics/lib/csv-json/keyword_rank_tmzplumbing.csv';

// Arrays we'll use later
$keys = array();
$newArray = array();
// Function to convert CSV into associative array
function csvToArray($file, $delimiter) { 
  if (($handle = fopen($file, 'r')) !== FALSE) { 
    $i = 0; 
    while (($lineArray = fgetcsv($handle, 10000, $delimiter, '"')) !== FALSE) { 
      for ($j = 0; $j + 1 < count($lineArray); $j++) { 
        $arr[$i][$j] = $lineArray[$j]; 
      } 
      $i++; 
    } 
    fclose($handle); 
  } 
  return $arr; 
} 
// Do it
$data = csvToArray($feed, ',');
// Set number of elements (minus 1 because we shift off the first row)
$count = count($data) - 1;
  
//Use first row for names  
$labels = array_shift($data);  
foreach ($labels as $label) {
  $keys[] = $label;
}
// Add Ids, just in case we want them later
$keys[] = 'id';
for ($i = 0; $i < $count; $i++) {
  $data[$i][] = $i;
}
  
// Bring it all together
for ($j = 0; $j < $count; $j++) {
  $d = array_combine($keys, $data[$j]);
  $newArray[$j] = $d;
}
// Print it out as JSON
echo json_encode($newArray);
?>