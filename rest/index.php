<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();


$app = new \Slim\Slim(array(
    'debug' => true,
    'mode'  => 'development'
));
$app->contentType('application/json');

$app->get('/liveevents/:type', function ($type) {
	$url = "https://sbfacade.bpsgameserver.com/PlayableMarketService/PlayableMarketServicesV2.svc/json2/FetchOngoingLiveEvents?segmentId=601&languageCode=en&timeZoneStandardName=GMT%20Standard%20Time";
	$ch = curl_init ($url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
	$return = curl_exec ($ch);	
	echo $return;
});

$app->get('/upcomingliveevents/:type', function ($type) {
    $url = "https://sbfacade.bpsgameserver.com/PlayableMarketService/PlayableMarketServicesV2.svc/json2/FetchUpcomingLiveEvents?segmentId=601&languageCode=en&timeZoneStandardName=GMT%20Standard%20Time";
    $ch = curl_init ($url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    $return = curl_exec ($ch);
    echo $return;
});

$app->get('/mostpopular/:type', function ($type) {
    $url = "https://sbfacade.bpsgameserver.com/PlayableMarketService/PlayableMarketServicesV2.svc/json2/FetchMostPopularMarkets?segmentId=601&languageCode=en&size=5&timeZoneStandardName=GMT%20Standard%20Time";
    $ch = curl_init ($url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    $return = curl_exec ($ch);
    echo $return;
});

$app->get('/closingsoon/:type', function ($type) {
    $url = "https://sbfacade.bpsgameserver.com/PlayableMarketService/PlayableMarketServicesV2.svc/json2/FetchClosingSoon?segmentId=601&languageCode=en&timeZoneStandardName=GMT%20Standard%20Time&nrOfMarkets=5";
    $ch = curl_init ($url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    $return = curl_exec ($ch);
    echo $return;
});

$app->run();