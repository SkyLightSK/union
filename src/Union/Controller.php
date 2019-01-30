<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 26.01.19
 * Time: 3:09
 */

namespace Union;

use Union\Contracts\Hookable;
use Union\Hook\HasHooks;

abstract class Controller implements Hookable
{
    use HasHooks;

//    public $actions;
    public $filters;


    public function __construct()
    {
        self::$_instances[] = $this;

        $this->setActions();
        $this->addActions();
    }

}