<?php

namespace JsonDump\Test;

use JsonDump\Dumper;

class JsonDumpTest extends \PHPUnit_Framework_TestCase
{
    public function testDump()
    {
        $this->expectOutputString($this->getExpected());

        Dumper::toJson("Hello", 15);
    }

    private function getExpected(): string
    {
        return '[
    {
        "type": "string",
        "value": "Hello"
    },
    {
        "type": "integer",
        "value": 15
    }
]';
    }
}
