<?php

namespace JsonDump\Test\Type;

use JsonDump\Type\NullType;

class NullTest extends \PHPUnit_Framework_TestCase
{
    public function testNull()
    {
        $value = new NullType;

        $this->assertTrue($value->supports(null));

        $this->assertEquals(["value" => null], $value->info(null));
    }
}
