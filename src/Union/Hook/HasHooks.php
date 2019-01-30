<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 26.01.19
 * Time: 3:35
 */

namespace Union\Hook;

use Union\Contracts\Hookable;

trait HasHooks
{

    /**
     * @var array
     */
    public $actions = [];

    /**
     * @var \SplObjectStorage
     */
    private $observers;

    private static $_instances = array();

    public function __destruct()
    {
        unset(self::$_instances[array_search($this, self::$_instances, true)]);
    }


    public static function getInstances($includeSubclasses = false)
    {
        $return = array();
        $obj_class = self::class;
        foreach(self::$_instances as $instance) {
            if ( $instance instanceof $obj_class )
            {
                if ($includeSubclasses || (get_class($instance) === $obj_class ))
                {
                    $return[] = $instance;
                }
            }
        }
        return $return;
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(\SplObserver $observer)
    {
        foreach ($this->observers as $key => $s)
        {
            if ($s === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @param array $action
     */
    public function addAction( array $action)
    {
        $this->actions[] = $action;
    }

    /**
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }


    public function setActions(){
        $this->actions;
    }

    public function addActions(){
        if(!$this->actions) return;

        foreach( $this->actions as $action ){
            add_action( $action[0], $action[1] );
        }

        if(!$this->filters) return;

        foreach( $this->filters as $filter ){
            add_action( $filter[0], $filter[1] );
        }
    }

}