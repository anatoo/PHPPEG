<?php
include_once dirname(__FILE__) . '/t/t.php';
$lime = new lime_test;

$parser = PEG::andalso(PEG::token('hoge'), PEG::token('h'));

$lime->is($parser->parse($c = PEG::context('hoge')), 'h');
$lime->is($c->read(3), 'oge');

$result = $parser->parse(PEG::context('hogaaa'));
$lime->ok($result instanceof PEG_Failure);