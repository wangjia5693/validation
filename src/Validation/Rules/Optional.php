<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

use Validation\Validatable;

class Optional extends AbstractWrapper
{
    public function __construct(Validatable $rule)
    {
        $this->validatable = $rule;
    }

    private function isOptional($input)
    {
        return in_array($input, [null, ''], true);
    }

    public function assert($input)
    {
        if ($this->isOptional($input)) {
            return true;
        }

        return parent::assert($input);
    }

    public function check($input)
    {
        if ($this->isOptional($input)) {
            return true;
        }

        return parent::check($input);
    }

    public function validate($input)
    {
        if ($this->isOptional($input)) {
            return true;
        }

        return parent::validate($input);
    }
}
