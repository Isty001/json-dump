<?php

namespace JsonDump;

use JsonDump\Exception\NotFoundException;
use JsonDump\Type\AbstractNestedType;
use JsonDump\Type\Type;

class Registry
{
    /**
     * @var Type[]
     */
    private $types;

    public function __construct(string ...$types)
    {
        $this->setTypes($types);
    }

    private function setTypes(array $classes)
    {
        foreach ($classes as $class) {
            $this->types[] = $this->instantiate($class);
        }
    }

    private function instantiate(string $class): Type
    {
        if (is_subclass_of($class, AbstractNestedType::class)) {
            return new $class($this);
        }

        return new $class;
    }

    public function typeFor($variable): Type
    {
        foreach ($this->types as $type) {
            if ($type->supports($variable)) {
                return $type;
            }
        }

        throw new NotFoundException("No Type found for variable");
    }

    public function infoFor($variable)
    {
        return $this->typeFor($variable)->info($variable);
    }
}
