<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 26.01.19
 * Time: 3:35
 */

namespace Union\Ajax;

trait AjaxSubjectable
{

    /**
     * @var array
     */
    private $actions = [];

    /**
     * @var \SplObjectStorage
     */
    private $observers;

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
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @param array $action
     */
    public function addAction( array $action)
    {
        $this->actions = $action;
    }

    /**
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }

}