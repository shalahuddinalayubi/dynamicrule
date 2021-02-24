<?php

namespace Alobenk\DynamicRule;

use Illuminate\Support\Arr;

class Rule
{
    public static function getValidationRules() : array
    {
        if (!property_exists(static::class, 'rules')) {
            return [];
        }

        if (func_num_args() === 0) {
            return static::$rules;
        }

        if (func_num_args() === 1 && is_string(func_get_arg(0))) {
            return Arr::only(static::$rules, func_get_arg(0));
        }

        $attributes = func_num_args() === 1 && is_array(func_get_arg(0))
            ? func_get_arg(0)
            : func_get_args();

        return Arr::only(static::$rules, $attributes);
    }
}
