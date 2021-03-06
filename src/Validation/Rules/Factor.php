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
use Validation\Exceptions\ValidationException;

/**
 * @author David Meister <thedavidmeister@gmail.com>
 */
class Factor extends AbstractRule
{
    public $dividend;

    public function __construct($dividend)
    {
        if (!is_numeric($dividend) || (int) $dividend != $dividend) {
            $message = 'Dividend %s must be an integer';
            throw new ComponentException(sprintf($message, ValidationException::stringify($dividend)));
        }

        $this->dividend = (int) $dividend;
    }

    public function validate($input)
    {
        // Every integer is a factor of zero, and zero is the only integer that
        // has zero for a factor.
        if ($this->dividend === 0) {
            return true;
        }

        // Factors must be integers that are not zero.
        if (!is_numeric($input) || (int) $input != $input || $input == 0) {
            return false;
        }

        $input = (int) abs($input);
        $dividend = (int) abs($this->dividend);

        // The dividend divided by the input must be an integer if input is a
        // factor of the dividend.
        return is_integer($dividend / $input);
    }
}
