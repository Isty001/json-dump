<?php

namespace JsonDump\Type;

class NullType implements Type
{
    public function supports($variable): bool
    {
        return is_null($variable);
    }

    public function info($variable): array
    {
        return [
            "value" => null
        ];
    }
}
