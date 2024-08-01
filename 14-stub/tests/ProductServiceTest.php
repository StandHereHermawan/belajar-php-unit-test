<?php

namespace AriefKarditya\StubPhp;

use AriefKarditya\StubPhp\Entity\Product;
use AriefKarditya\StubPhp\Repository\ProductRepository;
use AriefKarditya\StubPhp\Service\ProductService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class ProductServiceTest extends TestCase
{
    private ProductRepository $repository;
    private ProductService $service;

    /**
     * @before
     */
    protected function createRepoAndServices(): void
    {
        $this->repository = $this->createStub(ProductRepository::class);
        $this->service = new ProductService($this->repository);
    }

    /**
     * @test
     */
    public function productStubbing()
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->method("findById")->willReturn($product);

        $result = $this->repository->findById("1");

        Assert::assertSame($product, $result);
    }

    /**
     * @test
     */
    public function multipleProductEntityStubbingOnMap()
    {
        $product1 = new Product();
        $product1->setId("1");

        $product2 = new Product();
        $product2->setId("2");

        $product3 = new Product();
        $product3->setId("3");

        $map = [
            ["1", $product1],
            ["2", $product2],
            ["3", $product3]
        ];

        $this->repository->method("findById")->willReturnMap($map);

        Assert::assertSame($product1, $this->repository->findById("1"));
        Assert::assertSame($product2, $this->repository->findById("2"));
        Assert::assertSame($product3, $this->repository->findById("3"));
    }

    /**
     * @test
     */
    public function productStubCallback()
    {
        $this->repository->method("findById")
            ->willReturnCallback(function (string $id) {
                $product = new Product();
                $product->setId($id);
                return $product;
            });
        Assert::assertSame("1", $this->repository->findById("1")->getId());
        Assert::assertSame("2", $this->repository->findById("2")->getId());
        Assert::assertSame("3", $this->repository->findById("3")->getId());
        Assert::assertSame("4", $this->repository->findById("4")->getId());
    }

    /**
     * @test
     */
    public function registerMethodServiceSuccessScenario() # ProductService Test success 
    {
        $this->repository->method("findById")
            ->willReturn(null);
        $this->repository->method("save")
            ->willReturnArgument(0);

        $product = new Product();
        $product->setId("1");
        $product->setName("Contoh Product");

        $result = $this->service->register($product);

        Assert::assertEquals($product->getId(), $result->getId());
        Assert::assertEquals($product->getName(), $result->getName());
    }

    /**
     * @test
     */
    public function registerMethodServiceFailScenario() # ProductService Test Exception
    {
        $this->expectException(\Exception::class);

        $productInDB = new Product();
        $productInDB->setId("1");
        $this->repository->method("findById")
            ->willReturn($productInDB);

        $product = new Product();
        $product->setId("1");
        $product->setName("Contoh Product");

        $this->service->register($product);
    }
}
