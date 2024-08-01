<?php

namespace AriefKarditya\MockObjectPhp\Repository;

use AriefKarditya\MockObjectPhp\Entity\Product;

interface ProductRepository
{
    function save(Product $product): Product;

    function delete(Product $product): void;

    function findById(string $id): ?Product;

    function findAll(): array;
}
