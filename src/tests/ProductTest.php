<?php

class ProductTest extends PHPUnit\Framework\TestCase
{
    public function testIfIdIsNull()
    {
        $product = new \SON\Model\Product();
        $this->assertNull($product->getId());
    }

    public function testSetAndGetName()
    {
        $product = new \SON\Model\Product();
        $this->assertNull($product->getName());
        //Assim que receber a instancia de produto checa se o retorno é da calsse produto
        $this->assertInstanceOf(\SON\Model\Product::class, $product->setName("Meu produto 1"));
        $this->assertEquals("Meu produto 1", $product->getName());
        
    }

    public function testSetAndGetPrice()
    {
        $product = new \SON\Model\Product();
        $this->assertNull($product->getPrice());
        $this->assertInstanceOf(\SON\Model\Product::class, $product->setPrice(10.10));
        $this->assertEquals(10.10, $product->getPrice());
    }

    public function testSetAndGetQuantity()
    {
        $product = new \SON\Model\Product();
        $this->assertNull($product->getQuantity());
        $this->assertInstanceOf(\SON\Model\Product::class, $product->setQuantity(5));
        $this->assertEquals(5, $product->getQuantity());
    }

    public function testIfTotalIsNull()
    {
        $product = new \SON\Model\Product();
        $this->assertNull($product->getTotal());
    }
}