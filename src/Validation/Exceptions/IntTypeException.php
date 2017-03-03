<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class IntTypeException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be of the type integer',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be of the type integer',
        ],
    ];
}
