<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\ProductRepository;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Auth;

class Product extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function displayMy()
    {
        sleep(5);

        return ProductModel::where('company_id', Auth::user()->company->id)->with('category')->paginate();
    }
}