<?php

namespace JsonDump\Test\Type;

use JsonDump\Registry;
use JsonDump\Type\ArrayType;
use JsonDump\Type\NumericType;
use JsonDump\Type\ObjectType;
use JsonDump\Type\StringType;

class ObjectTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testObject()
    {
        $registry = new Registry(ArrayType::class, NumericType::class, StringType::class, ObjectType::class);
        $value = $registry->typeFor(new \stdClass);

        $object = new TestObject("SomeOne", 92, ["Data"]);
        $this->assertTrue($value->supports($object));

        $this->assertEquals($this->getExpected(), $value->info($object));
    }

    private function getExpected(): array
    {
        return [
            "type" => "object",
            "class" => TestObject::class,
            "properties" => [
                "obj" => [
                    "type" => "object",
                    "visibility" => "private",
                    "class" => \stdClass::class,
                ],
                "name" => [
                    "visibility" => "private",
                    "type" => "string",
                    "value" => "SomeOne",
                ],
                "age" => [
                    "visibility" => "protected",
                    "type" => "integer",
                    "value" => 92
                ],
                "data" => [
                    "visibility" => "public static",
                    "type" => "array",
                    "size" => 1,
                    "items" => [
                        0 => [
                            "type" => "string",
                            "value" => "Data"
                        ]
                    ]
                ],
            ]
        ];
    }
}

class TestObject
{
    private $obj;
    private $name;
    protected $age;
    public static $data;

    public function __construct(string $name, int $age, array $data)
    {
        $this->obj = new \stdClass;
        $this->name = $name;
        $this->age = $age;
        static::$data = $data;
    }
}
