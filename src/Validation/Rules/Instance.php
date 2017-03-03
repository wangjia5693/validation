<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class Instance extends AbstractRule
{
    public $instanceName;

    public function __construct($instanceName)
    {
        $this->instanceName = $instanceName;
    }

    public function reportError($input, array $extraParams = [])
    {
        return parent::reportError($input, $extraParams);
    }

    public function validate($input)
    {
        return $input instanceof $this->instanceName;
    }
}
