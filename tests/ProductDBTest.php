<?php

use SON\Model\Product;

class ProductDBTest extends PHPUnit\Framework\TestCase
{
    //desativa destruição automatica após primeiro metodo.
    protected $backupGlobals = false;

    public function testIfProductIsSaved()
    {
        global $db;
        $product = new Product($db);
        $result = $product->save([
            'name' => 'Produto 1',
            'price' => 200.20,
            'quantity' => 10
        ]);

        $this->assertEquals(1, $result->getId());
        $this->assertEquals('Produto 1', $result->getName());
        $this->assertEquals(200.20, $result->getPrice());
        $this->assertEquals(10, $result->getQuantity());
        $this->assertEquals(200.20*10, $result->getTotal());
    }

    public function testIfListProducts()
    {
        global $db;
        $product = new Product($db);
        $product->save([
            'name' => 'Produto 1',
            'price' => 200.20,
            'quantity' => 10
        ]);
        $products = $product->all();
        $this->assertCount(2, $products);
    }
}