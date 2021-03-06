<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

/**
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class ScalarValException extends ValidationException
{
    /**
     * @var array
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a scalar value',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a scalar value',
        ],
    ];
}
