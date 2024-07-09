<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalog';

    protected $fillable = [
        'entity_id', 'CategoryName', 'sku', 'name', 'description',
        'shortdesc', 'price', 'link', 'image', 'Brand', 'Rating',
        'CaffeineType', 'Count', 'Flavored', 'Seasonal', 'Instock',
        'Facebook', 'IsKCup'
    ];
}
