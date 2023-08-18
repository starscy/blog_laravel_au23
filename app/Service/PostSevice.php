<?php
namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostSevice
{
    public function store(array $data):void
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tags = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tags);
            Db::commit();
        } catch (\Exception) {
            Db::rollBack();
            abort(500);
        }
    }

    public function update(Post $post, array $data):void
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tags = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }

            $post->tags()->sync($tags);
            $post->update($data);
            Db::commit();
        } catch (\Exception) {
            Db::rollBack();
            abort(500);
        }
    }
}
