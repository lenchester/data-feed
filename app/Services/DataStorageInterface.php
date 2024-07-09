<?php

namespace App\Services;

interface DataStorageInterface
{
    public function store(string $tableName, array $data);
}
