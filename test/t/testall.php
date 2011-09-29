<?php
include_once dirname(__FILE__) . '/t.php';

$h = new lime_harness(new lime_output);
$h->register_glob(dirname(__FILE__) . '/../*.php');
$h->run();
