<?php

namespace JsonDump\Test\Type;

use JsonDump\Type\BooleanType;

class BooleanTest extends \PHPUnit_Framework_TestCase
{
    public function testBoolean()
    {
        $value = new BooleanType;

        $this->assertTrue($value->supports(false));

        $this->assertEquals(["type" => "boolean", "value" => true], $value->info(true));
    }
}
