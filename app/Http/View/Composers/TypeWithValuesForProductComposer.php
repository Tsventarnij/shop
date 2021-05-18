<?php
namespace App\Http\View\Composers;

use App\Models\Type;
use Illuminate\View\View;

class TypeWithValuesForProductComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $types = json_encode(Type::select('id', 'name')->with('values')->get()->toArray());
        $view->with('types', $types);
    }
}