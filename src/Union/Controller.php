<?php
/**
 * Created by PhpStorm.
 * User: skylight
 * Date: 26.01.19
 * Time: 3:09
 */

namespace Union;

use Union\Ajax\AjaxSubjectable;

class Controller implements \SplSubject
{
    use AjaxSubjectable;
}