<?php

use SON\Area;

//para versão 5.7 usar:
// extends PHPUnit_Framework_TestCase
class MyFirstTest extends PHPUnit\Framework\TestCase
{
    public function testArray()
    {
        $array = [2];
        $this->assertNotEmpty($array);
    }

    public function testArea()
    {
        $area = new Area();
        $this->assertEquals(6, $area->getArea(2, 3));
    }
}