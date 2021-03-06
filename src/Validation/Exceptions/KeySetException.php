<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class KeySetException extends GroupedValidationException
{
    const STRUCTURE = 2;

    /**
     * @var array
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NONE => 'All of the required rules must pass for {{name}}',
            self::SOME => 'These rules must pass for {{name}}',
            self::STRUCTURE => 'Must have keys {{keys}}',
        ],
        self::MODE_NEGATIVE => [
            self::NONE => 'None of these rules must pass for {{name}}',
            self::SOME => 'These rules must not pass for {{name}}',
            self::STRUCTURE => 'Must not have keys {{keys}}',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function chooseTemplate()
    {
        if ($this->getParam('keys')) {
            return static::STRUCTURE;
        }

        return parent::chooseTemplate();
    }
}
