<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Menghitung total price sebelum produk diperbarui
        if (!empty($data['discount'])) {
            $data['total'] = ($data['price'] - $data['discount']);
        } else {
            $data['total'] = $data['price'];
        }

        return $data;
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

