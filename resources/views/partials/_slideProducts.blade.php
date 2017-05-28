<div class="products-swiper">
    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
        <div class="swiper-wrapper">
            @foreach($featureds as $featured)
                <div class="swiper-slide">
                    <div class="paddings-container">
                        <div class="product-slide-entry">
                            <div class="product-image">

                                <img src="/img/medium/{{$featured->filename}}" alt="{{$featured->product_name}}" />

                                @if($featured->custom_discount != null)
                                    <div class="product-image-label type-2"><span>{{number_format($featured->custom_discount), 0}}% OFF</span></div>
                                @endif
                                @if($featured->new != null)
                                    <div class="product-image-label type-1"><span>NEW</span></div>
                                @endif
                                <form novalidate="" method="post">
                                    <input type="hidden" class="product_id" name="product_id" value="{{$featured->id}}" />
                                    <a class="top-line-a right add-to-wishlist" data-product_id="{{$featured->id}}"><i class="fa fa-heart"></i> </a>
                                </form>
                                <a href="{{$featured->path}}" class="top-line-a left quick-view">Details <i class="fa fa-search-plus"></i></a>
                                <div class="bottom-line">
                                    <a class="bottom-line-a open-product" data-id="{{$featured->id}}"><i class="fa fa-shopping-cart"></i> Add to bag</a>
                                </div>
                            </div>
                            <?php
                            $subcategory_path = dirname($featured->path);
                            ?>
                            <a class="tag" href="{{$subcategory_path}}">{{$featured->title}}</a>

                            <a class="title"  href="{{$featured->path}}">{{$featured->product_name}}</a>
                            <div class="price">
                                @if($featured->custom_discount != null)
                                    <div class="prev">${{$featured->price}}</div> |
                                    <div class="current">${{ number_format($featured->price - (($featured->price/100) * $featured->custom_discount), 2) }}</div>
                                @else
                                    <div class="current">${{$featured->price}}</div>
                                @endif
                            </div>
                            <div class="information-blocks">
                                <a class="button style-17 open-product" id="getUser" data-id="{{$featured->id}}"><i class="fa fa-shopping-bag"></i>Add to bag</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination"></div>
    </div>
</div>