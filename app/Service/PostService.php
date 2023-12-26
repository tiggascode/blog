<?php

namespace App\Service;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService 
{
    public function store( $data){
        try {
            Db::beginTransaction();
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
    
    
            $data['preview_image']  = Storage::disk('public')->put('/images',  $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post =  Post::firstOrCreate( $data);
            $post->tags()->attach($tagIds);
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
    }
    }
    public function update($data,$post){
        try{
            Db::beginTransaction();
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
    
            if( array_key_exists('preview_image',$data))
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            if( array_key_exists('main_image',$data))
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        
            $post->update($data);
            $post->tags()->sync($tagIds);
            Db::commit();


        }catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }

        return $post;
        
    }

    public function messages(){
        return [
            'category_id.required' => 'Required',
            'tag_ids' => 'Required',
        ];
    }
}