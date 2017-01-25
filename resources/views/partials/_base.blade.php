<div class="row">
    <div class="col-sm-4 information-entry">
        <h3 class="block-title inline-product-column-title">Our favorite products</h3>
        @inject('favorites', 'App\Services\BaseService')
        @foreach($favorites->get_favorites_base() as $favorite)
            <div class="inline-product-entry">
                <a href="{{$favorite->path}}" class="image"><img alt="{{$favorite->product_name}}" src="/img/xs/{{ $favorite->featured_image->filename }}"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="{{$favorite->path}}" class="title">{{$favorite->product_name}}</a>
                        <div class="price">
                            @if($favorite->custom_discount != null)
                                <div class="prev">${{ $favorite->price }}</div> |
                                <div class="current">${{ $favorite->discounted_price }}</div>
                            @else
                                <div class="current">${{ $favorite->price }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        @endforeach
    </div>
    <div class="col-sm-4 information-entry">
        <h3 class="block-title inline-product-column-title">New arrivals</h3>
        @inject('new_arrivals', 'App\Services\BaseService')
        @foreach($new_arrivals->get_new_arrivals_base() as $new_arrival)
        <div class="inline-product-entry">
            <a href="{{$new_arrival->path}}" class="image"><img alt="{{$new_arrival->product_name}}" src="/img/xs/{{ $new_arrival->featured_image->filename }}"></a>
            <div class="content">
                <div class="cell-view">
                    <a href="{{$new_arrival->path}}" class="title">{{$new_arrival->product_name}}</a>
                    <div class="price">
                        @if($new_arrival->custom_discount != null)
                            <div class="prev">${{ $new_arrival->price }}</div> |
                            <div class="current">${{ $new_arrival->discounted_price }}</div>
                        @else
                            <div class="current">${{ $new_arrival->price }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        @endforeach
    </div>
    <div class="col-sm-4 information-entry">
        <h3 class="block-title inline-product-column-title">Promotions</h3>
        @inject('promotions', 'App\Services\BaseService')
        @foreach($promotions->get_promotions_base() as $promotion)
            <div class="inline-product-entry">
                <a href="{{$promotion->path}}" class="image"><img alt="{{$promotion->product_name}}" src="/img/xs/{{ $promotion->featured_image->filename }}"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="{{$promotion->path}}" class="title">{{$promotion->product_name}}</a>
                        <div class="price">
                            @if($promotion->custom_discount != null)
                                <div class="prev">${{ $promotion->price }}</div> |
                                <div class="current">${{ $promotion->discounted_price }}</div>
                            @else
                                <div class="current">${{ $promotion->price }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        @endforeach

    </div>
</div>