<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class MultipleException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be multiple of {{multipleOf}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be multiple of {{multipleOf}}',
        ],
    ];
}
