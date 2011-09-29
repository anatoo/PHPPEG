<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;

function a($context)
{
    return $context->readElement();
}

$p = PEG::parserOf('a');
$t->is($p->parse(PEG::context('fuga')), 'f');
