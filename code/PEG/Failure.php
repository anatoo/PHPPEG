<?php
/**
 * @package PEG
 * @author anatoo<anatoo@nequal.jp>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: Failure.php 655 2009-04-12 07:26:42Z anatoo $
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