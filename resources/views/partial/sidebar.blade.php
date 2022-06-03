<!-- widget-search -->
<aside class="widget-search mb-30">
    <form action="#">
        <input type="text" placeholder="Search here...">
        <button type="submit"><i class="zmdi zmdi-search"></i></button>
    </form>
</aside>
<aside class="widget widget-categories box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">Categories</h6>
    <div id="cat-treeview" class="product-cat">

        <ul>
            @foreach($categories as $category)
                <?php $sub_categories = \App\Models\Subcategory::query()->select(['id', 'title'])->where('category_id', $category->id)->get() ?>

                <li class="closed"><a href="#">{{$category->title}}</a>
                    <ul>
                        @foreach($sub_categories as $sub_category)
                            <li><a data-order="{{$sub_category->id}}" href="{{route('/sort-by-category',$sub_category->id)}}"
                                   class="ajax-form">{{$sub_category->title}}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
<!-- shop-filter -->
<aside class="widget shop-filter box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">Price</h6>
    <div class="price_filter">
        <div class="price_slider_amount">
            <input type="submit" value="You range :"/>
            <input type="text" id="amount" name="price" placeholder="Add Your Price"/>
        </div>
        <div id="slider-range"></div>
    </div>
</aside>
<!-- widget-color -->
<aside class="widget operating-system  box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">Brands</h6>
    <form action="action_page.php">
        @foreach($brands as $brand)
            <label>
                <input type="checkbox" name="brand-{{$brand->id}}"
                       value="{{$brand->name}}">{{$brand->name}}
            </label>
            <br>
        @endforeach
    </form>
</aside>
<!-- operating-system -->
<aside class="widget operating-system box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">operating system</h6>
    <form action="action_page.php">
        @foreach($systems as $system)
            <label><input type="checkbox" name="operating-{{$system->id}}"
                          value="{{$system->title}}">{{$system->title}}</label><br>
        @endforeach
    </form>
</aside>
<!-- widget-product -->
<aside class="widget widget-product box-shadow">
    <h6 class="widget-title border-left mb-20">recent products</h6>
    <!-- product-item start -->
    <div class="product-item">
        <div class="product-img">
            <a href="single-product.html">
                <img src="img/product/4.jpg" alt=""/>
            </a>
        </div>
        <div class="product-info">
            <h6 class="product-title">
                <a href="single-product.html">Product Name</a>
            </h6>
            <h3 class="pro-price">$ 869.00</h3>
        </div>
    </div>
    <!-- product-item end -->
    <!-- product-item start -->
    <div class="product-item">
        <div class="product-img">
            <a href="single-product.html">
                <img src="img/product/8.jpg" alt=""/>
            </a>
        </div>
        <div class="product-info">
            <h6 class="product-title">
                <a href="single-product.html">Product Name</a>
            </h6>
            <h3 class="pro-price">$ 869.00</h3>
        </div>
    </div>
    <!-- product-item end -->
    <!-- product-item start -->
    <div class="product-item">
        <div class="product-img">
            <a href="single-product.html">
                <img src="img/product/12.jpg" alt=""/>
            </a>
        </div>
        <div class="product-info">
            <h6 class="product-title">
                <a href="single-product.html">Product Name</a>
            </h6>
            <h3 class="pro-price">$ 869.00</h3>
        </div>
    </div>
    <!-- product-item end -->
</aside>
