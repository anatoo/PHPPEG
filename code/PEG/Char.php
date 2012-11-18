<?php
/**
 * @package PEG
 * @author anatoo<anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: Char.php 1965 2010-07-17 17:15:34Z anatoo $
 */

class PEG_Char implements PEG_IParser
{
    protected $dict = array(), $except;

    /**
     * @param string
     * @param bool
     */
    function __construct($str, $except = false)
    {
        $this->except = $except;
        foreach (str_split($str) as $c) {
            $this->dict[$c] = true;
        }
    }

    function parse(PEG_IContext $context)
    {
        $char = $context->readElement();
        return $char !== false && ($this->except xor isset($this->dict[$char]))
            ? $char
            : PEG::failure();
    }
}
