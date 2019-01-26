<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 26.01.19
 * Time: 2:25
 */

namespace Union\Observer;

class UnionObserver implements \SplObserver
{
    /**
     * @var array
     */
    private $Objects = [];

    /**
     * It is called by the Subject, usually by SplSubject::notify()
     *
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        $this->Objects[] = clone $subject;
    }

    /**
     * @return array
     */
    public function getChangedObjects()
    {
        return $this->Objects;
    }


}