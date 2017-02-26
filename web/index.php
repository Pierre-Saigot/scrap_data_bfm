<?php 

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app = new Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app['news.url'] = 'http://www.bfmtv.com/breves-et-depeches/';	

$app['scrap'] = function() use($app){

	 return  new \Utils\Scrap($app['news.url']);
};

$app->get('/', function() use($app) {

	$new = 'The last news :';
    
    return $app['twig']->render('Front/home.twig',['news'=>$new]);
});

$app->match('receive', function()use($app){
 	header('Content-Type: application/json');
 	$scrap = $app['scrap'];
	return ('<b>' .$scrap);
});


$app->run();