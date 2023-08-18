<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(Category $category, StoreRequest $request)
    {
        $category->update($request->validated());

        return redirect()->route('admin.category.index');
    }
}
