<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes



$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'login.phtml', $args);
});

$app->get('/client', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/client' route");

    // Render index view
    return $this->renderer->render($response, 'client.phtml', $args);
});

$app->get('/admin', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/client' route");

    // Render index view
    return $this->renderer->render($response, 'admin.phtml', $args);
});

$app->get('/login', function (Request $request, Response $response, array $args) {
    // Sample log message
    $username = $request->getQueryParam("name", $default = null);
    $policy = $request->getQueryParam("policy", $default = null);
    if($username === "admin" and $policy === "root"){
        return $response->withStatus(302)->withHeader('Location', './admin');
    }
    $dbCon = getConnection();
    $sql1 = "SELECT * FROM owners WHERE fname = '$username' AND policy = '$policy'";
    $r = mysqli_query($dbCon, $sql1);
    $array = array();
    if ( $r !== false && mysqli_num_rows($r) > 0 ) {
        while ( $a = mysqli_fetch_assoc($r) ) {
        array_push($array, $a);
        }
    }
    if(sizeof($array) > 0){
        return $response->withStatus(302)->withHeader('Location', './client');
    } else {
        return $response->withStatus(302)->withHeader('Location', './');
    }
    
    //$this->logger->info($username .= $password .= "Slim-Skeleton '/admin' route");

    // Render index view
    
});

