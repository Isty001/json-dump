<?php

namespace JsonDump;

use JsonDump\Type\{
    ArrayType, BooleanType, NullType, NumericType, ObjectType, StringType
};

class Dumper
{
    const KNOWN_TYPES = [
        ObjectType::class, ArrayType::class, NullType::class,
        BooleanType::class, NumericType::class, StringType::class
    ];

    /** @var Registry */
    private static $registry;
    private static $initialized = false;

    public static function toJson(...$variables)
    {
        self::init();

        $dump = [];

        foreach ($variables as $variable) {
            $dump[] = self::$registry->infoFor($variable);
        }

        echo json_encode($dump, JSON_PRETTY_PRINT);
    }

    private function init()
    {
        if (false === self::$initialized) {
            self::$registry = new Registry(...self::KNOWN_TYPES);
        }

        self::$initialized = true;
    }
}
