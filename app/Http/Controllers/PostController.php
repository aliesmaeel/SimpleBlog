<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{

    public function index() : View
    {
        $posts=Post::query()->where('active',true)
                            ->whereDate('published_at','<',now())
                            ->orderBy('published_at','DESC')
                            ->paginate(10);

        return view('home',compact('posts'));
    }

    public function show(Post $post) :View
    {
        if (!$post or $post->published_at > now())
             throw new NotFoundHttpException();

        $next=Post::where('active',true)
                    ->whereDate('published_at','<=',now())
                    ->whereDate('published_at','<',$post->published_at)
                    ->orderBy('published_at','desc')
                    ->first();

        $previous=Post::where('active',true)
                    ->whereDate('published_at','<=',now())
                    ->whereDate('published_at','>',$post->published_at)
                    ->orderBy('published_at','asc')
                    ->first();

        return view('post.view',compact('post','next','previous')) ;
    }

    public  function postByCategory(Category $category)
    {

        $posts=Post::query()->whereHas('categories',function ($query) use ($category){
            $query->where('categories.id', $category->id);
        })
            ->where('active',true)
            ->whereDate('published_at','<',now())
            ->orderBy('published_at','desc')
             ->paginate(10);

        return view('components.byCategory',compact('posts','category'));
    }



}
