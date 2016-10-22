<?php

namespace JsonDump\Test;

use JsonDump\Exception\NotFoundException;
use JsonDump\Registry;
use JsonDump\Type\{
    BooleanType, StringType
};

class RegistryTest extends \PHPUnit_Framework_TestCase
{
    public function testRegistry()
    {
        $registry = new Registry(BooleanType::class, StringType::class);

        $this->assertInstanceOf(BooleanType::class, $registry->typeFor(false));
        $this->assertInstanceOf(StringType::class, $registry->typeFor("Hello"));

        $this->expectException(NotFoundException::class);
        
        $registry->typeFor(92);
    }
}
