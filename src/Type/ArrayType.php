<?php

namespace JsonDump\Type;

class ArrayType extends AbstractNestedType
{
    public function supports($variable): bool
    {
        return is_array($variable);
    }

    protected function createBaseInfo(): array
    {
        return [
            "type" => "array",
        ];
    }

    protected function collectInfo($array, array $info): array
    {
        $info["size"] = count($array);

        foreach ($array as $key => $variable) {
            $info["items"][$key] = $this->infoAbout($variable, $info);
        }

        return $info;
    }
}
