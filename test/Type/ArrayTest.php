<?php

namespace JsonDump\Test\Type;

use JsonDump\Registry;
use JsonDump\Type\{
    ArrayType, BooleanType, NumericType, StringType
};

class ArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testArray()
    {
        $registry = new Registry(NumericType::class, StringType::class, BooleanType::class, ArrayType::class);
        $value = $registry->typeFor([]);

        $this->assertTrue($value->supports([]));

        $array = [
            91,
            "Hello",
            "nested" => [
                "More", false
            ]
        ];

        $this->assertEquals($this->getExpected(), $value->info($array));
    }

    private function getExpected(): array
    {
        return [
            "type" => "array",
            "size" => 3,
            "items" => [
                0 => [
                    "type" => "integer",
                    "value" => 91
                ],
                1 => [
                    "type" => "string",
                    "value" => "Hello",
                ],
                "nested" => [
                    "type" => "array",
                    "size" => 2,
                    "items" => [
                        0 => [
                            "type" => "string",
                            "value" => "More",
                        ],
                        1 => [
                            "type" => "boolean",
                            "value" => false
                        ]
                    ]
                ]
            ]
        ];
    }
}
