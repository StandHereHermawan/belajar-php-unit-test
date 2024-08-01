<?php

namespace AriefKarditya\MockObjectPhp;

use AriefKarditya\MockObjectPhp\Entity\Product;
use AriefKarditya\MockObjectPhp\Repository\ProductRepository;
use AriefKarditya\MockObjectPhp\Service\ProductService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class ProblemWithStub extends TestCase
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
    public function deleteSuccess(): void
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->method("findById")
            ->willReturn($product);

        $this->service->delete("1"); # Unit test tidak error padahal prosedur untuk menghapus pada services sudah dihapus. ada yang salah dengan stub-bing.
        Assert::assertTrue(true, "Success Delete");
    }

    /**
     * @test
     */
    public function deleteFail(): void
    {
        $this->expectException(\Exception::class);
        $this->repository->method("findById")
            ->willReturn(null);

        $this->service->delete("1");
    }

    /**
     * @test
     */
    public function productStub()
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
    public function productStubMap()
    {
        $product1 = new Product();
        $product1->setId("1");

        $product2 = new Product();
        $product2->setId("2");

        $map = [
            ["1", $product1],
            ["2", $product2],
        ];

        $this->repository->method("findById")->willReturnMap($map);

        Assert::assertSame($product1, $this->repository->findById("1"));
        Assert::assertSame($product2, $this->repository->findById("2"));
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
    }

    /**
     * @test
     */
    public function registerSuccess()
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
    public function registerFail()
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
