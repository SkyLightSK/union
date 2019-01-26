<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 26.01.19
 * Time: 3:11
 */

namespace Union;

use Union\Ajax\AJaxSubjectable;

abstract class Model extends \WeDevs\ORM\Eloquent\Model implements \SplSubject
{
  use AJaxSubjectable;

}