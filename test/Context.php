<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;

$context = PEG::context('hogehoge');
$t->is($context->read(4), 'hoge');
$t->is($context->tell(), 4);
$context->seek(0);
$t->is($context->tell(), 0);
$context->read(8);
$t->ok($context->eos());

