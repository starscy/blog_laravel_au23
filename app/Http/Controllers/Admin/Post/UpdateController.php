<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UpdateController extends BaseController
{
    public function __invoke(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->update($post, $data);

        return redirect()->route('admin.post.index');
    }
}
