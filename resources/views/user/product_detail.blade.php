@extends("user.layout")
@section("content")
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="product__details__pic">
                <div class="product__details__pic__item">
                    <img class="product__details__pic__item--large"
                         src="{{$product->thumbnail}}" alt="">
                </div>
                <div class="product__details__pic__slider owl-carousel">
                    <img data-imgbigurl="img/product/details/product-details-2.jpg"
                         src="img/product/details/thumb-1.jpg" alt="">
                    <img data-imgbigurl="img/product/details/product-details-3.jpg"
                         src="img/product/details/thumb-2.jpg" alt="">
                    <img data-imgbigurl="img/product/details/product-details-5.jpg"
                         src="img/product/details/thumb-3.jpg" alt="">
                    <img data-imgbigurl="img/product/details/product-details-4.jpg"
                         src="img/product/details/thumb-4.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
                <h3>{{$product->name}}</h3>
                <div class="product__details__rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <span>(18 reviews)</span>
                </div>
                <div class="product__details__price">${{number_format($product->price)}}</div>
                <p>{{$product->description}}</p>
                <form action="{{route("add_to_cart",["product"=>$product->id])}}" method="post">
                    @csrf
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="number" name="qty" value="1">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="primary-btn">ADD TO CARD</button>
                </form>

                <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                <ul>
                    <li><b>Availability</b> <span>In Stock</span></li>
                    <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                    <li><b>Weight</b> <span>0.5 kg</span></li>
                    <li><b>Share on</b>
                        <div class="share">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="product__details__tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                           aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                           aria-selected="false">Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                           aria-selected="false">Reviews <span>(1)</span></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="product__details__tab__desc">
                            <h6>Products Infomation</h6>
                            <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                            <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                sed sit amet dui. Proin eget tortor risus.</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <div class="product__details__tab__desc">
                            <h6>Products Infomation</h6>
                            <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                Proin eget tortor risus.</p>
                            <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                        <div class="product__details__tab__desc">
                            <h6>Products Infomation</h6>
                            <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                Proin eget tortor risus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title related__product__title">
                <h2>Related Product</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($related_products as $p)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{$p->thumbnail}}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{route("product_detail",["product"=>$p->id])}}">{{$p->name}}</a></h6>
                        <h5>${{number_format($p->price)}}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title related__product__title">
                <h2>Best sellers</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($best_sellers as $p)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{$p->thumbnail}}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{route("product_detail",["product"=>$p->id])}}">{{$p->name}}</a></h6>
                        <h5>${{number_format($p->price)}}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
