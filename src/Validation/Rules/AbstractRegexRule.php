<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

abstract class AbstractRegexRule extends AbstractFilterRule
{
    abstract protected function getPregFormat();

    public function validateClean($input)
    {
        return preg_match($this->getPregFormat(), $input);
    }
}
