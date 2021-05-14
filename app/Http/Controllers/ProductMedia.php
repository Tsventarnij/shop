<?php

namespace App\Http\Controllers;

use App\Repository\ProductMediaRepository;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use \App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductMedia extends Controller
{
    /**
     * @var ProductRepository
     */
    private $mediaRepo;

    public function __construct(ProductMediaRepository $mediaRepository)
    {
        $this->mediaRepo = $mediaRepository;
    }

    public function destroy($id)
    {
        $productId = \App\Models\ProductMedia::find($id)->product_id;
        $this->mediaRepo->delete($id);
        return redirect(route('productUpdate', $productId));
    }
}
