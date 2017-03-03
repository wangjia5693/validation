<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

use Validation\Exceptions\ComponentException;
use Validation\Validatable;

abstract class AbstractWrapper extends AbstractRule
{
    protected $validatable;

    public function getValidatable()
    {
        if (!$this->validatable instanceof Validatable) {
            throw new ComponentException('There is no defined validatable');
        }

        return $this->validatable;
    }

    public function assert($input)
    {
        return $this->getValidatable()->assert($input);
    }

    public function check($input)
    {
        return $this->getValidatable()->check($input);
    }

    public function validate($input)
    {
        return $this->getValidatable()->validate($input);
    }

    public function setName($name)
    {
        $this->getValidatable()->setName($name);

        return parent::setName($name);
    }
}
