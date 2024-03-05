<?php 

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService {
    public function store($data) {
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image'] = Storage::disk('public')->put('/image',  $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/image',$data['main_image']);
        
        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tagIds);
    }

    public function update($data, $post){
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        
        if(isset($data['preview_image']))
            $data['preview_image'] = Storage::disk('public')->put('/image',  $data['preview_image']);
        if(isset($data['main_image']))
            $data['main_image'] = Storage::disk('public')->put('/image',$data['main_image']);
        
        $post->update($data);
        $post->tags()->sync($tagIds);
        return $post;
    }
}