<?php
namespace App\Repository;

use App\Models\MediaType;
use App\Models\ProductMedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductMediaRepository
{
    public function deleteByProduct(int $productId)
    {
        $medias = ProductMedia::where('product_id', $productId)->get()->toArray();
        Storage::delete(array_map(function ($media) { return $media['url'];}, $medias));
        ProductMedia::where('product_id', $productId)->delete();
    }

    public function delete(int $id)
    {
        $media = ProductMedia::find($id)->toArray();
        if ($media && Auth::user()->company->products()->find($media['product_id'])) {
            Storage::delete($media['url']);
            ProductMedia::destroy($id);
        }
    }
}