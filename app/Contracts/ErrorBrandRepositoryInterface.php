<?php

namespace App\Contracts;

interface ErrorBrandRepositoryInterface
{
    public function index();

    public function indexOnline();

    public function all();

    public function show( int $errorBrandId );

    public function showOnline( int $errorBrandId );

    public function store( array $data );

    public function update( array $data , int $errorBrandId );

    public function destroy(int $errorBrandId);
}
