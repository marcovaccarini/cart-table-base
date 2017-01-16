@foreach($childs as $child)
    {{--<a href="/{{ $mainCategory->slug }}/{{ $category->slug }}/{{ $child->slug }}"> {{ $child->title }} </a>--}}
    <li><a href="/{{ $categoryMenu->slug }}/{{ $subCategoryMenu }}/{{ $child->slug }}/"><i class="fa fa-angle-right"></i> {{ $child->title }} </a></li>
@endforeach


