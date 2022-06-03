@foreach($products as $product)
    <!-- product-item start -->
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="product-item">
            <div class="product-img">
                <a href="single-product.html">
                    <img style="width: 270px; height: 300px"
                         src="/{{$product->images}}"
                         alt=""/>
                </a>
            </div>
            <div class="product-info">
                <h6 class="product-title">
                    <a href="single-product.html">{{$product->title}}</a>
                </h6>
                <div class="pro-rating">
                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                </div>
                <h3 class="pro-price">@if($product->new_price != null)
                        {{$product->new_price}} грн
                    @else
                        {{$product->price}} грн
                    @endif </h3>
                <ul class="action-button">
                    <li>
                        <a href="#" title="Wishlist"><i
                                class="zmdi zmdi-favorite"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal"
                           data-target="#productModal" title="Quickview"><i
                                class="zmdi zmdi-zoom-in"></i></a>
                    </li>
                    <li>
                        <a href="#" title="Compare"><i
                                class="zmdi zmdi-refresh"></i></a>
                    </li>
                    <li>
                        <a href="#" title="Add to cart"><i
                                class="zmdi zmdi-shopping-cart-plus"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- product-item end -->
@endforeach
