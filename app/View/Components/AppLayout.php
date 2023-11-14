<?php

namespace App\View\Components;
use App\Models\Category;
use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Builder;


class AppLayout extends Component
{

    public function __construct(public ?string $metaTitle=null , public  ?string $metaDescription= null)
    {

    }


    public function render(): View|Closure|string
    {

        $categories = Category::withCount(['posts', 'posts as total' => function (Builder $query) {
            $query->where('active',true);
        }])
            ->orderByDesc('total')
            ->get()
            ->reject(function ($category) {
                return $category->total == 0;
            });


        return view('layouts.app',compact('categories'));
    }
}
