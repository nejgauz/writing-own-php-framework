<?php
require_once('vendor/autoload.php');
use Symfony\Component\HttpFoundation\Response;

$response = new Response(
    '<h1>Content</h1>',
    Response::HTTP_OK,
    [
        'cache-control' => 'public',
    ]
);
$response->send();
