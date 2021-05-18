<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\DefaultCategoryTypes;
use App\Models\Type;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;

class Category extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repo;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repo = $categoryRepository;
    }

    public function index()
    {
        return view('category/list', ['categories' => CategoryModel::all()->toArray()]);
    }

    public function create()
    {
        $types = Type::all()->toArray();
        return view('category/form', ['types' => json_encode($types)]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $input = $request->only('title', 'add_type', 'new_type');
        $this->repo->create($input);
        return redirect(route('categoryList'));
    }

    public function edit($id)
    {
        $types = Type::all()->toArray();
        $category = CategoryModel::with('defaultTypes')->find($id)->toArray();
        return view('category/form', [
            'types' => json_encode($types),
            'category' => $category,
        ]);
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $input = $request->only('title', 'add_type', 'new_type');
        $this->repo->update($id, $input);
        return redirect(route('categoryList'));
    }

    public function removeType(Request $request, int $id)
    {
        $request->validate(['type_id' => 'required']);
        DefaultCategoryTypes::where('type_id', $request->input('type_id'))->where('category_id', $id)->delete();
        return redirect(route('categoryUpdate', $id));
    }

    public function destroy(int $id)
    {
        $result = $this->repo->delete($id);
        return redirect(route('categoryList', $result));
    }
}
