<?php

namespace JsonDump\Type;

use JsonDump\Registry;

abstract class AbstractNestedType implements Type
{
    protected $registry;

    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    public function info($variable): array
    {
        return $this->collectInfo($variable, $this->createBaseInfo());
    }

    protected function infoAbout($variable, $info)
    {
        if ($this->supports($variable)) {
            return $this->collectInfo($variable, $info);
        }

        return $this->registry->typeFor($variable)->info($variable);
    }

    abstract protected function createBaseInfo(): array;
    
    abstract protected function collectInfo($variable, array $info): array;
}
