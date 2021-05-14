<?php
namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;

class Category extends Controller
{

    public function create()
    {
        $types = Type::all()->toArray();
        return view('category/form', $types);
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {
        $types = Type::all()->toArray();
        $category = CategoryModel::with('type')->find($id)->toArray();
        return view('product/form', [
            'types' => $types,
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {

    }

    public function removeType(int $id)
    {

    }
}
