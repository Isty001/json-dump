<?php

namespace JsonDump\Type;

interface Type
{
    public function supports($variable): bool;
    
    public function info($variable): array;
}
