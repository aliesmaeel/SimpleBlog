<aside class="w-full md:w-1/3 flex flex-col items-center px-3">
    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <h1 class="text-xl font-semibold mb-3 text-left">All Categories</h1>
        @foreach($categories as $category)
            <a class=" px-2 {{request('category')?->slug == $category->slug ? 'bg-blue-500 rounded' :  ''}}" href="{{route('post-by-category',$category)}}" >
                {{$category->title}} ({{$category->total}})
            </a>
        @endforeach
    </div>
    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">{{\App\Models\TextWidget::getTitle('about-us-sidebar')}}</p>
        <p class="pb-2">
            {!! \App\Models\TextWidget::getContent('about-us-sidebar') !!}</p>
        <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            Get to know us
        </a>
    </div>



</aside>
