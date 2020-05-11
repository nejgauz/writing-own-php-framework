<?php
require_once('vendor/autoload.php');
use Symfony\Component\HttpFoundation\Response;
$content = '<h1>Error 301</h1> <h2>The resource moved permanently. Please <a href="\resp200.php">click here</a> to redirect.</h2>';
$response = new Response(
    $content,
    Response::HTTP_MOVED_PERMANENTLY,
    [
        'cache-control' => 'public',
    ]
);
$response->send();