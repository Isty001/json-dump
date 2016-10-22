<?php

namespace JsonDump\Type;

class ObjectType extends AbstractNestedType
{
    public function supports($variable): bool
    {
        return is_object($variable);
    }

    protected function createBaseInfo(): array
    {
        return [
            "type" => "object"
        ];
    }

    protected function collectInfo($object, array $info): array
    {
        $properties = (new \ReflectionClass($object))->getProperties();
        $info["class"] = get_class($object);

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $value = $property->getValue($object);
            $info = $this->addProperty($info, $value, $property);
        }

        return $info;
    }

    protected function addProperty(array $info, $value, \ReflectionProperty $property): array
    {
        $visibility = $this->getVisibility($property);
        $visibility = $this->addStatic($visibility, $property);

        $info["properties"][$property->getName()] = array_merge(["visibility" => $visibility], $this->infoAbout($value, $info));

        return $info;
    }

    private function addStatic(string $visibility, \ReflectionProperty $property): string
    {
        if ($property->isStatic()) {
            return $visibility. " static";
        }

        return $visibility;
    }

    private function getVisibility(\ReflectionProperty $property)
    {
        if ($property->isPrivate()) {
            return "private";
        } else if ($property->isProtected()) {
            return "protected";
        }

        return "public";
    }
}
