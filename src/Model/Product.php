<?php
declare(strict_types = 1);

namespace SON\Model;

class Product
{
    private $id;
    private $name;
    private $price;
    private $quantity;
    private $total;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName($name): Product
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice($price): Product
    {
        $this->price = $price;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity($quantity): Product
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal($total): Product
    {
        $this->total = $total;
        return $this;
    }
}