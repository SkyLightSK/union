<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 26.01.19
 * Time: 3:11
 */

namespace Union;

use Union\Contracts\Hookable;
use Union\Hook\HasHooks;

abstract class Model extends \WeDevs\ORM\Eloquent\Model implements Hookable
{
  use HasHooks;

  public function __construct(array $attributes = array())
  {
      parent::__construct($attributes);
      self::$_instances[] = $this;
  }

}