<?php
require_once('vendor/autoload.php');
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$response = new Response(
    '<h1>Content</h1>',
    Response::HTTP_OK,
    [
        'cache-control' => 'public',
    ]
);
$response->prepare(Request::createFromGlobals());
$response->send();
