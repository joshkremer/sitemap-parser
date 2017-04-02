<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$sitename = "New District";

function createFileForDownload($sitename){

  $urls = array();

  $DomDocument = new DOMDocument();
  $DomDocument->preserveWhiteSpace = false;
  $DomDocument->load('https://newdistrict.ca/sitemap.xml');
  $DomNodeList = $DomDocument->getElementsByTagName('loc');

  // Create file for download
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="' . $sitename . '.csv"');


  foreach($DomNodeList as $url) {
      $urls[] = $url->nodeValue;
  }

  $file = fopen("$sitename.csv","w");


  foreach ($urls as $line)
    {
    fputcsv($file,explode(',',$line));
    echo $line . "\n";

    }

  fclose($file);
};

createFileForDownload($sitename);



?>
