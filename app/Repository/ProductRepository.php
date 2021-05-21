<?php
namespace App\Repository;

use App\Factories\ProductMediaView\Factory as ProductMediaViewFactory;
use App\Builder\ProductMedia as ProductMediaBuilder;
use App\Models\Product;
use App\Models\TypeValues;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductRepository
{
    /**
     * @var ProductMediaRepository
     */
    private $mediaRepository;

    public function __construct(ProductMediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }

    public function addMedia(array $files, int $productId)
    {
        foreach ($files as $file) {
            $media = new ProductMediaBuilder($productId);
            $path = $file->store('product_media', 'public');
            $media->create($file->extension(), $path);
        }
    }

    public function getWithMedia(int $productId): array
    {
        $product = Product::with('company')->with('media')->find($productId)->toArray();
        $factory = new ProductMediaViewFactory();
        $medias = [];
        if (isset($product['media'])) {
            foreach ($product['media'] as $media) {
                $mediaView = $factory->get($media['media_type_id']);
                $medias[$media['id']] = $mediaView->draw($media['url'], $media['title']);
            }
            unset($product['media']);
        }
        $product['medias'] = $medias;

        return $product;
    }

    public function delete(int $productId)
    {
        $product = Auth::user()->company->products()->find($productId);
        if ($product) {
            $this->mediaRepository->deleteByProduct($productId);
        }
        $product->delete();
    }

    public function create(array $data)
    {
        $product = Auth::user()->company->products()
            ->create(array_intersect_key($data, array_flip(['title', 'description', 'price', 'category_id'])));

        if (isset($data['media'])) {
            $this->addMedia($data['media'], $product->id);
        }

        if (isset($data['add_type'])) {
            foreach ($data['add_type'] as $index => $type) {
                if (is_numeric($data['add_values'][$index])) {
                    $valuesId =  $data['add_values'][$index];
                } else {
                    $valuesId = TypeValues::create(['type_id' => $type, 'values' => $data['add_values'][$index]]);
                }
                $product->properties()->create(['type_value_id' => $valuesId]);
            }
        }

        return $product;
    }

    public function getMy()
    {
        return Product::where('company_id', Auth::user()->company->id)->with('category')->get()->toArray();
    }
}