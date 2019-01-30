<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 26.01.19
 * Time: 3:05
 */

namespace Union\Hook;

use Union\Observer\UnionObserver;

class HookObserver extends UnionObserver
{
    /**
     * @var array
     */
    private $actions = [];

    public function getActions()
    {
        foreach( $this->getChangedObjects() as $object )
        {
            array_merge( $this->actions , $object->getActions());
        }
    }

}