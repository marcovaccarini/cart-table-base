<div class="block-title size-3">Categories</div>
    <div class="accordeon">
        @inject('categories', 'App\Services\CategoriesService')

        {{--{{ $categories->get_categories($mainCategory->slug) }}--}}

    @foreach($categories->get_categories($mainCategory->slug) as $category)
        <div class="accordeon-title">{{ $category->title }}</div>
        <div class="accordeon-entry">
            <div class="article-container style-1">
                <ul>
                @if(count($category->childs))
                    @include('partials._manageChild',['childs' => $category->childs])
                @endif
                </ul>
            </div>
        </div>
    @endforeach
    </div>
</div>