<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(Tag $tag, StoreRequest $request)
    {
        $tag->update($request->validated());

        return redirect()->route('admin.tag.index');
    }
}
