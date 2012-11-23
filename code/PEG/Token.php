<?php
/**
 * @package PEG
 * @author anatoo<anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 *
 */

class PEG_Token implements PEG_IParser
{
    protected $args;

    function __construct(Array $args)
    {
        $this->args = $args;
    }

    function parse(PEG_IContext $c)
    {
        return $c->token($this->args);
    }

    static function get($token)
    {
        static $dict = array();
        return isset($dict[$token]) 
            ? $dict[$token] 
            : $dict[$token] = new self(array($token));
    }
}
