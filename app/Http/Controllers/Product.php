<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use \App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Auth;

class Product extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($categoryId = null)
    {
        $model = ProductModel::with('MainImage');
        $products = is_null($categoryId)
            ? $model->get()
            : $model->where('category_id', $categoryId)->get();

        return view('welcome', [
            'products' => $products->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            ]);
        $input = $request->only('title', 'description', 'price', 'category_id');
        $product = Auth::user()->company->products()->create($input);

        if ($request->hasFile('media')) {
            $files = $request->file('media');
            $this->productRepo->addMedia($files, $product->id);
        }
        return redirect(route('showMyProducts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show(int $id)
    {
        return view('product/show', $this->productRepo->getWithMedia($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->company->products()->find($id)) {
            return redirect(route('showMyProducts'));
        }
        return view('product/form', $this->productRepo->getWithMedia($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        $input = $request->only('title', 'description', 'price', 'category_id');
        Auth::user()->company->products()->find($id)->update($input);
        if ($request->hasFile('media')) {
            $files = $request->file('media');
            $this->productRepo->addMedia($files, $id);
        }
        return redirect(route('showMyProducts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepo->delete($id);
        return redirect(route('showMyProducts'));
    }

    public function displayMy()
    {
        $products = ProductModel::where('company_id', Auth::user()->company->id)->with('category')->get();
        return view('product/owner_list', [
            'products' => $products->toArray(),
        ]);
    }
}
