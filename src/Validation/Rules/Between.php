<?php

/*
 * 间距验证；包括数字，字符串，日期，第三个参数意味是否包含
 */

namespace Validation\Rules;

use Validation\Exceptions\ComponentException;

class Between extends AllOf
{
    public $minValue;
    public $maxValue;

    public function __construct($min = null, $max = null, $inclusive = true)
    {
        $this->minValue = $min;
        $this->maxValue = $max;
        if (!is_null($min) && !is_null($max) && $min > $max) {
            throw new ComponentException(sprintf('%s cannot be less than  %s for validation', $min, $max));
        }

        if (!is_null($min)) {
            $this->addRule(new Min($min, $inclusive));
        }

        if (!is_null($max)) {
            $this->addRule(new Max($max, $inclusive));
        }
    }
}
