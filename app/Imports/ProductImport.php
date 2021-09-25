<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'],
            'units' => $row['unit'],
            'price' => $row['price']
        ]);
    }
}
