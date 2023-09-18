<?php

namespace Models\Entities;

use Core\Entity;

final class Articles extends Entity
{

    private $id;
    private $name;
    private $price;
    private $quantity;
    private $total;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function __toString()
    {
        return $this->getId() . " " . $this->getName() . " " . $this->getPrice() . " " . $this->getQuantity() . " " . $this->getTotal();
    }
}
