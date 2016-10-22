<?php

namespace JsonDump\Type;


class BooleanType implements Type
{
    public function supports($variable): bool
    {
        return is_bool($variable);
    }

    public function info($variable): array
    {
        return [
            "type" => "boolean",
            "value" => $variable
        ];
    }
}
