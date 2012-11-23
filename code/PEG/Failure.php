<?php
/**
 * @package PEG
 * @author anatoo<anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 *
 */

class PEG_Failure
{
    private function __construct(){ } 
    
    static function it()
    {
        static $o = null;
        return $o ? $o : $o = new self;
    }
}
