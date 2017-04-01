<?php
$urls = array();
$sitename = "New District";

$DomDocument = new DOMDocument();
$DomDocument->preserveWhiteSpace = false;
$DomDocument->load('https://newdistrict.ca/sitemap.xml');
$DomNodeList = $DomDocument->getElementsByTagName('loc');

foreach($DomNodeList as $url) {
    $urls[] = $url->nodeValue;
}

$file = fopen("$sitename.csv","w");

foreach ($urls as $line)
  {
  fputcsv($file,explode(',',$line));
  echo $line . "\n";

  }

fclose($file); ?>


?>
