<tr>
    <td>
        <a href="/admin/product/{{ $product->id }}/edit" class="image">
            <img alt="{{ $product->product_name }}" src="/img/xs/{{ $product->featured_image->filename }}">
        </a>
    </td>
    <td>
        <a href="/admin/product/{{ $product->id }}/edit" class="product-title">
            {{ $product->product_name }}
        </a> <br> {{ $product->specification }}
    </td>

    <td class="text-nowrap">
        @if($product->custom_discount != null)
            <span class="label label-warning">${{ $product->price }}</span>
            <span class="badge bg-red">-{{ number_format($product->custom_discount, 0) }}%</span>
            <span class="label label-success">${{ $product->discounted_price }}</span>
        @else
            <span class="label label-success">${{ $product->price }}</span>
        @endif
    </td>
    <td>
        <span class="product-description">
            {{ $product->description }}
        </span>
    </td>