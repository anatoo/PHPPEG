<?php
/**
 * PEG_Refクラスはパーサ同士がお互いに依存しているときに使われる
 * @package PEG
 * @author anatoo<anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 *
 */

class PEG_Ref implements PEG_IParser
{
    protected $parser;
    
    function __construct(&$parser)
    {
        $this->parser = &$parser;
    }
    
    function parse(PEG_IContext $c)
    {
        return $this->parser->parse($c);
    }
    
    function &getRef()
    {
        return $this->parser;
    }

    function is(PEG_IParser $p)
    {
        $this->parser = $p;
    }
}
