<?php 
 namespace Utils;

use Goutte\Client;

 Class Scrap{

 	private $url;

 	public function __construct( string $url){
 		$this->url = $url;
 		$client = new Client();
		$titles = array();
		$hrefs = array();
		$hours = array();

		$crawler = $client->request('GET', $this->url);

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

		echo json_encode($result);
 	}
 }