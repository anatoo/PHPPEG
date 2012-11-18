<?php
/**
 * @package PEG
 * @author anatoo<anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: And.php 655 2009-04-12 07:26:42Z anatoo $
 */

class PEG_And implements PEG_IParser
{
    protected $arr = array();
    
    function __construct(Array $arr)
    {
        foreach ($arr as $p) $this->with($p);
    }
    
    protected function with(PEG_IParser $p)
    {
        $this->arr[] = $p;
    }
    
    function parse(PEG_IContext $c)
    {
        $arr = $this->arr;
        if (!$arr) return PEG::failure();
        for ($i = 0; $i < count($arr) - 1 ; $i++) {
            $offset = $c->tell();
            if ($arr[$i]->parse($c) instanceof PEG_Failure) return PEG::failure();
            $c->seek($offset);
        }
        return $arr[$i]->parse($c);
    }
}
