<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class OptionalException extends ValidationException
{
    const STANDARD = 0;
    const NAMED = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'The value must be optional',
            self::NAMED => '{{name}} must be optional',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'The value must not be optional',
            self::NAMED => '{{name}} must not be optional',
        ],
    ];

    public function chooseTemplate()
    {
        return $this->getName() == '' ? static::STANDARD : static::NAMED;
    }
}
