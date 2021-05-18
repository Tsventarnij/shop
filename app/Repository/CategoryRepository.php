<?php
namespace App\Repository;

use App\Models\Category as CategoryModel;
use App\Models\DefaultCategoryTypes;
use App\Models\Product;
use App\Models\Type;

class CategoryRepository
{
    public function create(array $input)
    {
        $category = CategoryModel::create(['title' => $input['title']]);
        $this->appendType($category, $input);
    }

    public function update(int $id, array $input)
    {
        $category = CategoryModel::find($id);
        $category->title = $input['title'];
        $category->save();
        $this->appendType($category, $input);
    }

    private function appendType(CategoryModel $category, array $data)
    {
        $defaultTypeIds = [];
        if (isset($data['new_type'])) {
            foreach ($data['new_type'] as $typeName)
                $defaultTypeIds[] = Type::firstOrCreate(['name' => $typeName])->id;
        }
        if (isset($data['add_type'])) {
            $defaultTypeIds = array_merge($defaultTypeIds, $data['add_type']);
        }

        DefaultCategoryTypes::insert(array_map(function($id) use($category) {
            return ['type_id' => $id, 'category_id' => $category->id];
        }, $defaultTypeIds));
    }

    public function delete(int $id)
    {
        if (Product::where('category_id', $id)->first()) {
            return ['error' => __('The category has product association')];
        }
        return CategoryModel::destroy($id);
    }
}