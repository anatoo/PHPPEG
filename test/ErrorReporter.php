<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;

$p = PEG::error('hoge');
$c = PEG::context('fuga');

$p->parse($c);
$lime->is($c->lastError(), array(0, 'hoge'));

$c = PEG::context(array(1, 2));
$p->parse($c);
$lime->is($c->lastError(), array(0, 'hoge'));

$c->readElement();
$p->parse($c);
$lime->is($c->lastError(), array(1, 'hoge'));
