<?php
include_once dirname(__FILE__) . '/t/t.php';
$lime = new lime_test;

$context = PEG::context(array(1, 2, 3));

$lime->is($context->eos(), false);
$lime->is($context->read(1), array(1));
