<?php

namespace AriefKarditya\ConfigurationPhp;

use AriefKarditya\ConfigurationPhp\Entity\Product;
use AriefKarditya\ConfigurationPhp\Repository\ProductRepository;
use AriefKarditya\ConfigurationPhp\Service\ProductService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class ProductMockTest extends TestCase
{
    private ProductRepository $repository;
    private ProductService $service;

    /**
     * @before
     */
    protected function createRepoAndServices(): void
    {
        $this->repository = $this->createMock(ProductRepository::class); # Membuat Mock Object
        $this->service = new ProductService($this->repository);
    }

    /**
     * @test
     */
    public function tryMockProduct()
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->expects($this->once()) # Konfigurasi mock Object
            ->method("findById")
            ->willReturn($product);

        $result = $this->repository->findById("1");
        Assert::assertSame($product, $result);
    }

    /**
     * @test
     */
    public function deleteSuccess(): void # Integrasi dengan mock object
    {
        $this->repository->expects($this->once())
            ->method("delete");

        $product = new Product();
        $product->setId("1");

        $this->repository->expects($this->once())
            ->method("findById")
            ->willReturn($product);

        $this->service->delete("1");
        Assert::assertTrue(true, "Success delete");
    }

    /**
     * @test
     */
    public function deleteFail(): void # Integrasi dengan mock object
    {
        $this->repository->expects($this->never())
            ->method("delete");

        $product = new Product();
        $product->setId("1");

        $this->repository->expects($this->once())
            ->method("findById")
            ->willReturn(null);

        TestCase::expectException(\Exception::class);
        $this->service->delete("1");
    }

    /**
     * @test
     */
    public function deleteSuccessAgain(): void # Memastikan parameter benar
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->expects(TestCase::once())
            ->method("delete")
            ->with(Assert::equalTo($product));

        $this->repository->expects(TestCase::once())
            ->method("findById")
            ->with(Assert::equalTo($product->getId()))
            ->willReturn($product);

        $this->service->delete("1");
        Assert::assertTrue(true, "Success delete");
    }

    /**
     * @test
     */
    public function deleteFailAgain(): void # Memastikan parameter benar
    {
        $this->repository->expects(TestCase::never())
            ->method("delete");

        $product = new Product();
        $product->setId("1");

        $this->repository->expects(TestCase::once())
            ->method("findById")
            ->with(Assert::equalTo("1"))
            ->willReturn(null);

        TestCase::expectException(\Exception::class);
        $this->service->delete("1");
    }
}
