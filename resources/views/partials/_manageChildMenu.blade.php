@foreach($childs as $child)
    <div class="product-column-entry">
        {{-- <div class="image"><img alt="" src="/img/product-menu-2.jpg"></div>--}}
        <div class="submenu-list-title"><a href="/{{ $categoryMenu->slug }}/{{ $child->slug }}">{{ $child->title }}</a><span class="toggle-list-button"></span></div>
        <div class="description toggle-list-container">
            <ul class="list-type-1">
               @if(count($child->childs))
                    <?php
                        $subCategoryMenu = $child->slug;
                    ?>
                    @include('partials._manageChildSubMenu',['childs' => $child->childs])

                @endif

                {{--<li><a href="contact.html"><i class="fa fa-angle-right"></i>Contact Us 1</a></li>
                <li><a href="contact-2.html"><i class="fa fa-angle-right"></i>Contact Us 2</a></li>
                <li><a href="contact-3.html"><i class="fa fa-angle-right"></i>Contact Us 3</a></li>
                <li><a href="contact-4.html"><i class="fa fa-angle-right"></i>Contact Us 4</a></li>--}}
            </ul>
        </div>
    </div>
@endforeach