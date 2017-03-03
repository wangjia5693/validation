<?php

/*
 * Created by PhpStorm.
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation;

use ReflectionClass;
use Validation\Exceptions\ComponentException;

class Factory
{
    protected $rulePrefixes = ['\Validation\\Rules\\'];

    public function getRulePrefixes()
    {
        return $this->rulePrefixes;
    }

    private function filterRulePrefix($rulePrefix)
    {
        $namespaceSeparator = '\\';
        $rulePrefix = rtrim($rulePrefix, $namespaceSeparator);

        return $rulePrefix.$namespaceSeparator;
    }

    public function appendRulePrefix($rulePrefix)
    {
        array_push($this->rulePrefixes, $this->filterRulePrefix($rulePrefix));
    }

    public function prependRulePrefix($rulePrefix)
    {
        array_unshift($this->rulePrefixes, $this->filterRulePrefix($rulePrefix));
    }

    public function rule($ruleName, array $arguments = [])
    {
        if ($ruleName instanceof Validatable) {
            return $ruleName;
        }

        foreach ($this->getRulePrefixes() as $prefix) {
            $className = $prefix.ucfirst($ruleName);
            if (!class_exists($className)) {
                continue;
            }

            $reflection = new ReflectionClass($className);
            if (!$reflection->isSubclassOf('\Validation\\Validatable')) {
                throw new ComponentException(sprintf('"%s" is not a valid respect rule', $className));
            }

            return $reflection->newInstanceArgs($arguments);
        }

        throw new ComponentException(sprintf('"%s" is not a valid rule name', $ruleName));
    }
}
