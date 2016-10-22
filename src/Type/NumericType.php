<?php

namespace JsonDump\Type;

class NumericType implements Type
{
    public function supports($variable): bool
    {
        return is_int($variable) || is_double($variable);
    }

    public function info($variable): array
    {
        return [
            "type" => gettype($variable),
            "value" => $variable
        ];
    }
}
