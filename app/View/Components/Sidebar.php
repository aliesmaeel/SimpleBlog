<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\Component;

class Sidebar extends Component
{

    public function __construct()
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

        return view('components.sidebar',compact('categories'));
    }
}
