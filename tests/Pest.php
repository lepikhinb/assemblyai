<?php

use Pest\TestSuite;
use PHPUnit\Framework\TestCase;

function this(): TestCase
{
    return TestSuite::getInstance()->test;
}
