<?php

namespace AriefKarditya\MockObjectPhp\Entity;

class Product
{
    private string $id;
    private string $name;
    private string $description;
    private int $price;
    private int $quantities;

    public function __construct()
    {
        # kosong
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getQuantities(): int
    {
        return $this->quantities;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    public function setQuantities(int $quantities)
    {
        $this->quantities = $quantities;
    }
}
