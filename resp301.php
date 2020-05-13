<?php
require_once('vendor/autoload.php');
use Symfony\Component\HttpFoundation\RedirectResponse;

$response = new RedirectResponse('/resp200.php', 301);
$response->send();