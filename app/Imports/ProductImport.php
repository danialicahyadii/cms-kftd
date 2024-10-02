<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'material' => $row['material'],
            'text_material' => $row['text_material'],
            'baseuom' => $row['baseuom'],
            'prinsipal' => $row['prinsipal'],
            'lini' => $row['lini'],
         ]);
    }

    public function rules(): array
    {
        return [
            'material' => [
                'unique:product,material'
            ],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'material.unique' => 'The material ":input" already exists.',
        ];
    }
}
