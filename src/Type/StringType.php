<?php

namespace JsonDump\Type;

class StringType implements Type
{
    public function supports($variable): bool
    {
        return is_string($variable);
    }

    public function info($variable): array
    {
        return [
            "type" => "string",
            "value" => $variable
        ];
    }
}
