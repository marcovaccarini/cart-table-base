    @foreach($childs as $child)

        <li>

            <a href="/{{ $mainCategory->slug }}/{{ $category->slug }}/{{ $child->slug }}"> {{ $child->title }} </a>

            {{--@if(count($child->childs))

                @include('partials._manageChild',['childs' => $child->childs])

            @endif--}}

        </li>

    @endforeach


