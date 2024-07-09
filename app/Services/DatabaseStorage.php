<?php

namespace App\Services;

use App\Http\Middleware\ValidateSignature;
use App\Models\Catalog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class DatabaseStorage implements DataStorageInterface
{
    public function store(string $tableName, array $data)
    {
        Catalog::create($data);
    }
}
