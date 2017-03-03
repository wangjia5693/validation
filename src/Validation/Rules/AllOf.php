<?php

/*
 * 与链式添加验证一样，只是将所有的验证规则统一交给allof执行；
 */

namespace Validation\Rules;

class AllOf extends AbstractComposite
{
    public function assert($input)
    {
        $exceptions = $this->validateRules($input);
        $numRules = count($this->rules);
        $numExceptions = count($exceptions);
        $summary = [
            'total' => $numRules,
            'failed' => $numExceptions,
            'passed' => $numRules - $numExceptions,
        ];
        if (!empty($exceptions)) {
            throw $this->reportError($input, $summary)->setRelated($exceptions);
        }

        return true;
    }

    public function check($input)
    {
        foreach ($this->getRules() as $rule) {
            $rule->check($input);
        }

        return true;
    }

    public function validate($input)
    {
        foreach ($this->getRules() as $rule) {
            if (!$rule->validate($input)) {
                return false;
            }
        }

        return true;
    }
}
