<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 26.01.19
 * Time: 2:31
 */

namespace Union\Observer;

class UnionSubject implements \SplSubject
{
    /**
     * @var string
     */
    private $state;

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

}