<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <div>
                <form action="{{ url('search_product') }}" method="GET">
                    @csrf
                    <input style="width: 500px;" type="text" name="search" placeholder="Search for Something">
                    <input type="submit" value="Search" name="" id="">
                </form>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('product_details', $products->id) }}" class="option1">
                                    Product Detials
                                </a>
                                <form action="{{ url('add_cart', $products->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1">
                                        </div>
                                        <div class="col-md-4" style="width: 75px;">
                                            <input type="submit" value="Add to Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{ $products->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $products->name }}
                            </h5>
                            @if ($products->discount_price != null)
                                <h6 style="color:red;">
                                    Discount Price
                                    <br>
                                    {{ $products->discount_price }}
                                </h6>

                                <h6 style="text-decoration:line-through;color:blue;">
                                    Price
                                    <br>
                                    ${{ $products->price }}
                                </h6>
                            @else
                                <h6>
                                    Price
                                    <br>
                                    ${{ $products->price }}
                                </h6>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            <span style="padding-top: 20px;font-size:20px;display:flex; flex:0; justify-content:center;">
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
        </div>
</section>
