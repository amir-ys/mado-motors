<?php

namespace App\Contracts;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function destroy(int $productId);

    public function index();

    public function indexOnline();

    public function show(int $productId);

    public function similarProducts(int $productId);

    public function showOnline(int $productId);

    public function store(array $data);
}
