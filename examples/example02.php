<?php
include_once dirname(__FILE__) . '/../vendor/autoload.php';

/*
 * 単語にヒットするパーサ。
 * 
 * EBNF:
 * word := (PEG::alphabet | "_") (PEG::alphabet | PEG::digit | "_")+
 */

$word = PEG::join(PEG::seq(
    PEG::choice(PEG::alphabet(), PEG::token('_')), 
    PEG::many(PEG::choice(PEG::alphabet(), PEG::digit(), PEG::token('_')))
));

var_dump($word->parse(PEG::context('a'))); //=> 'a'
var_dump($word->parse(PEG::context('hogehoge'))); //=> 'hogehoge'
var_dump($word->parse(PEG::context('some_id'))); //=> 'some_id'
var_dump($word->parse(PEG::context('  '))); //=> パースに失敗する
var_dump($word->parse(PEG::context('hoge fuga'))); //=> パースはコンテキストの途中で止まり 'hoge'が返る
