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

class IdentityCard extends AbstractWrapper
{
    public $countryCode;

    public function __construct($countryCode)
    {
        $shortName = ucfirst(strtolower($countryCode)).'IdentityCard';
        $className = __NAMESPACE__.'\\Locale\\'.$shortName;
        if (!class_exists($className)) {
            throw new ComponentException(sprintf('There is no support for identity cards from "%s"', $countryCode));
        }

        $this->countryCode = $countryCode;
        $this->validatable = new $className();
    }
}
