<?php

namespace App\Contracts;

interface ErrorCategoryRepositoryInterface
{
    public function index();

    public function indexOnline();

    public function all();

    public function show( int $errorCategoryId );

    public function showOnline( int $errorCategoryId );

    public function store( array $data );

    public function update( array $data , int $errorCategoryId );

    public function destroy(int $errorCategoryId);
}
