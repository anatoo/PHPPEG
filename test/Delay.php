<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;

function parser()
{
    return PEG::token('a');
}

$p = PEG::delay('parser');
$t->is($p->parse(PEG::context('a')), 'a');
$t->is($p->parse(PEG::context('b')), PEG::failure());
