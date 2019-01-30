<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 30.01.19
 * Time: 23:17
 */

namespace Union;

use Union\Hook\HasHooks;

class BasePlugin
{

    public function __construct()
    {

    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "<pre>";
            var_dump(self::getHooks());
        echo "</pre>";

    }


    public static function getHookable()
    {
        $return = array();

        foreach( get_declared_classes() as $class )
        {
            foreach ( class_uses($class) as $use )
            {
                if ($use === HasHooks::class )
                {
                    $return[] = $class;
                }
            }
        }
        return $return;
    }

    public static function getHooks()
    {
        $return = array();

        foreach( self::getHookable() as $class )
        {
            foreach ( $class::getInstances(true) as $object )
            {
                $return[] = $object->getActions();
            }
        }
        return $return;
    }

}