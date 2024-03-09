<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class IndexController extends Controller
{
    public function __invoke()
    {
        $likedPostsCount = auth()->user()->likedPosts()->count();
        $commentPostsCount = auth()->user()->comments()->count();
        
        return view('personal.main.index', compact('likedPostsCount', 'commentPostsCount'));
    }
}
