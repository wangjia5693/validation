<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class NotBlankException extends ValidationException
{
    const STANDARD = 0;
    const NAMED = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'The value must not be blank',
            self::NAMED => '{{name}} must not be blank',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'The value must be blank',
            self::NAMED => '{{name}} must be blank',
        ],
    ];

    public function chooseTemplate()
    {
        return $this->getName() == '' ? static::STANDARD : static::NAMED;
    }
}
