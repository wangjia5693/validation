<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class CntrlException extends AlphaException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must contain only control characters',
            self::EXTRA => '{{name}} must contain only control characters and "{{additionalChars}}"',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not contain control characters',
            self::EXTRA => '{{name}} must not contain control characters or "{{additionalChars}}"',
        ],
    ];
}
