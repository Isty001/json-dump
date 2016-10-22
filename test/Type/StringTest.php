<?php

namespace JsonDump\Test\Type;

use JsonDump\Type\StringType;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testSting()
    {
        $value = new StringType;
        
        $this->assertTrue($value->supports("Hello"));
        $this->assertTrue($value->supports("193"));

        $expected = ["type" => "string", "value" => "Hello ŐÚ"];

        $this->assertEquals($expected, $value->info("Hello ŐÚ"));
    }
}
