<?php

namespace JsonDump\Test\Value;

use JsonDump\Type\NumericType;

class NumericTest extends \PHPUnit_Framework_TestCase
{
    public function testNumeric()
    {
        $value = new NumericType;

        $this->assertTrue($value->supports(1));
        $this->assertTrue($value->supports(3.1));
        $this->assertFalse($value->supports("98"));

        $this->assertEquals($value->info(19), ["type" => "integer", "value" => 19]);
        $this->assertEquals($value->info(11.93), ["type" => "double", "value" => 11.93]);
    }
}
