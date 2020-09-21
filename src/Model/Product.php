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

    private $pdo;

    /**
     * Product constructor.
     * @param $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getId(): ?int
    {
        return (int) $this->id;
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

    private function hydrate(array $data)
    {
        $this->id = $data['id'];
        $this->setName($data['name'])
            ->setPrice($data['price'])
            ->setQuantity($data['quantity']);
        $this->total = $data['total'];
    }

    public function save(array $data): Product
    {
        if(!isset($data['id'])) {
            $query = "INSERT INTO products (`name`,`price`,`quantity`,`total`) VALUES (:name,:price,:quantity,:total)";
            $stmt = $this->pdo->prepare($query);
        }else{
            $query = "UPDATE products set `name`=:name,`price`=:price,`quantity`=:quantity,`total`=:total WHERE `id`=:id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(":id", $data['id']);
        }

        $stmt->bindValue(":name", $data['name']);
        $stmt->bindValue(":price", $data['price']);
        $stmt->bindValue(":quantity", $data['quantity']);
        $data['total'] = $data['price'] * $data['quantity'];
        $stmt->bindValue(":total", $data['total']);

        $stmt->execute();
        $data['id'] = $data['id'] ?? $this->pdo->lastInsertId();
        $this->hydrate($data);
        return $this;
    }

    public function all()
    {
        $query = "SELECT * FROM products";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }
}