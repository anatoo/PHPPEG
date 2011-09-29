<?php
/**
 * 行頭に#があったら無視するパーサのサンプル
 */

include_once dirname(__FILE__) . '/../code/PEG.php';

$line = PEG::line();
$ignore = PEG::drop(PEG::andalso('#', $line));
$parser = PEG::join(PEG::many(PEG::choice($ignore, $line)));

$context = PEG::context('
Lorem ipsum dolor sit amet, 
#consectetur adipisicing elit, 
#sed do eiusmod tempor incididunt ut 
labore et dolore magna aliqua.
');

var_dump($parser->parse($context));
/* 結果
string(64) "
Lorem ipsum dolor sit amet, 
labore et dolore magna aliqua.
"
 */