<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Menghitung total price sebelum produk dibuat
        if (!empty($data['discount'])) {
            $data['total'] = ($data['price'] - $data['discount']);
        } else {
            $data['total'] = $data['price'];
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return '/admin/products';
    }
}

