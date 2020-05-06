<?php
require_once('vendor/autoload.php');
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
echo "Request Headers: \n";
var_dump($request->server->all());
if (!empty($request->request->all())) {
    echo "POST content: \n";
    var_dump($request->request->all());
}
if (!empty($request->query->all())) {
    echo "GET content: \n";
    var_dump($request->query->all());
}
if (!empty($request->cookies->all())) {
    echo "Cookies: \n";
    var_dump($request->cookies->all());
}
if (!empty($request->getContent())) {
    echo "Other data: \n";
    var_dump($request->getContent());
}
if (!empty($request->files->all())) {
    echo "FILES content: \n";
    var_dump($request->files->all());
}

