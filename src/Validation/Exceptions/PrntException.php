<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class PrntException extends AlphaException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must contain only printable characters',
            self::EXTRA => '{{name}} must contain only printable characters and "{{additionalChars}}"',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not contain printable characters',
            self::EXTRA => '{{name}} must not contain printable characters or "{{additionalChars}}"',
        ],
    ];
}
