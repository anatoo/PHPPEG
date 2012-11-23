<?php
include_once dirname(__FILE__) . '/../vendor/autoload.php';

/**
 * 括弧の対応をとる再帰的なパーサのサンプル。
 * 認識した括弧を用いて文字列を階層化する。
 * 
 * パーサのEBNFはこんな感じ
 * item       := paren | anything
 * paren_item := (?! ")") item
 * paren      := "(" paren_item* ")"
 * parser     := item*
 */


$paren =      PEG::ref($paren_ref);
$item =       PEG::choice($paren, PEG::anything());
$paren_item = PEG::andalso(PEG::not(')'), $item);
$paren_ref =  PEG::pack('(', PEG::many($paren_item), ')');
$parser =     PEG::many($item);

$str = 'abc(def(ghi)(jkl(mno)))pq';
var_dump($parser->parse(PEG::context($str)));
/* 結果
array(6) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
  [2]=>
  string(1) "c"
  [3]=>
  array(5) {
    [0]=>
    string(1) "d"
    [1]=>
    string(1) "e"
    [2]=>
    string(1) "f"
    [3]=>
    array(3) {
      [0]=>
      string(1) "g"
      [1]=>
      string(1) "h"
      [2]=>
      string(1) "i"
    }
    [4]=>
    array(4) {
      [0]=>
      string(1) "j"
      [1]=>
      string(1) "k"
      [2]=>
      string(1) "l"
      [3]=>
      array(3) {
        [0]=>
        string(1) "m"
        [1]=>
        string(1) "n"
        [2]=>
        string(1) "o"
      }
    }
  }
  [4]=>
  string(1) "p"
  [5]=>
  string(1) "q"
}
 */
