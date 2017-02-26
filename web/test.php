<?php 
header('Content-Type: application/json');
require_once 'goutte-v2.0.4.phar';

use Goutte\Client;

$client = new Client();

$titles = array();
$hrefs = array();
$hours = array();

$crawler = $client->request('GET', 'http://www.bfmtv.com/breves-et-depeches/');

$crawler->filter('.timeline a')->each(function ($node) use(&$titles, &$hrefs) {
    $title = $node->text();
    $href = $node->extract(array('href'));
	    if ($title != "") {
	    	$titles[] = $title;
	    }
	    if ($href[0] != "") {
	    	$hrefs[] = $href[0];
	    }
});

$crawler->filter('.hour')->each(function ($node) use(&$hours) {
    $hour =  $node->text();
    if ($hour != "") {
    	$hours[] = $hour;
    }
});

$result["response"] = array("titles" => $titles, "hrefs" => $hrefs, "hours" => $hours);

print(json_encode($result));