<?php

namespace AriefKarditya\ConfigurationPhp\Service;

use AriefKarditya\ConfigurationPhp\Repository\ProductRepository;
use AriefKarditya\ConfigurationPhp\Entity\Product;

class ProductService
{
    public function __construct(private ProductRepository $repository)
    {
        # konstruktor
    }

    public function register(Product $product): Product
    {
        if ($this->repository->findById($product->getId()) != null) {
            throw new \Exception("Product already exist.");
        }
        return $this->repository->save($product);
    }

    public function delete(string $id): void
    {
        $product = $this->repository->findById($id);
        if ($product != null) {
            $this->repository->delete($product);
        } else {
            throw new \Exception("Product is not found.");
        }
    }
}