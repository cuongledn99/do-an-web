@extends('layouts.homepage')
@section('content')
<!-- banner -->
<div class="banner-grid container">
    <div id="visual">
        <div class="slide-visual">
            <!-- Slide Image Area (1000 x 424) -->
            <ul class="slide-group">
                <li><img class="img-responsive" src="images/ba1.jpg" alt="Dummy Image" /></li>
                <li><img class="img-responsive" src="images/ba2.jpg" alt="Dummy Image" /></li>
                <li><img class="img-responsive" src="images/ba3.jpg" alt="Dummy Image" /></li>
            </ul>

            <!-- Slide Description Image Area (316 x 328) -->
            <div class="script-wrap">
                <ul class="script-group">
                    <li>
                        <div class="inner-script"><img class="img-responsive" src="images/baa1.jpg" alt="Dummy Image" />
                        </div>
                    </li>
                    <li>
                        <div class="inner-script"><img class="img-responsive" src="images/baa2.jpg" alt="Dummy Image" />
                        </div>
                    </li>
                    <li>
                        <div class="inner-script"><img class="img-responsive" src="images/baa3.jpg" alt="Dummy Image" />
                        </div>
                    </li>
                </ul>
                <div class="slide-controller">
                    <a href="#" class="btn-prev"><img src="images/btn_prev.png" alt="Prev Slide" /></a>
                    <a href="#" class="btn-play"><img src="images/btn_play.png" alt="Start Slide" /></a>
                    <a href="#" class="btn-pause"><img src="images/btn_pause.png" alt="Pause Slide" /></a>
                    <a href="#" class="btn-next"><img src="images/btn_next.png" alt="Next Slide" /></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <script type="text/javascript" src="js/pignose.layerslider.js"></script>
    <script type="text/javascript">
        //<![CDATA[
		$(window).load(function() {
			$('#visual').pignoseLayerSlider({
				play    : '.btn-play',
				pause   : '.btn-pause',
				next    : '.btn-next',
				prev    : '.btn-prev'
			});
		});
	//]]>
    </script>

</div>
<!-- //banner -->



<!-- //content-bottom -->
<!-- product-nav -->

<div class="product-easy container">
    <div class="" aria-labelledby="">
        <div class="col-md-3 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/a1.png" alt="" class="pro-image-front">
                    <img src="images/a1.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Air Tshirt Black</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$45.99</span>
                        <del>$69.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/a8.png" alt="" class="pro-image-front">
                    <img src="images/a8.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">1+1 Offer</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Next Blue Blazer</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$99.99</span>
                        <del>$109.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/a3.png" alt="" class="pro-image-front">
                    <img src="images/a3.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Air Tshirt Black </a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$119.99</span>
                        <del>$120.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/a4.png" alt="" class="pro-image-front">
                    <img src="images/a4.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Maroon Puma Tshirt</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$79.99</span>
                        <del>$120.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men yes-marg">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/a5.png" alt="" class="pro-image-front">
                    <img src="images/a5.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">Combo Pack</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Multicoloured TShirts</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$129.99</span>
                        <del>$150.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men yes-marg">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/a6.png" alt="" class="pro-image-front">
                    <img src="images/a6.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Air Tshirt Black </a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$129.99</span>
                        <del>$150.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men yes-marg">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/a7.png" alt="" class="pro-image-front">
                    <img src="images/a7.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Dresses</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$129.99</span>
                        <del>$150.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men yes-marg">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/a2.png" alt="" class="pro-image-front">
                    <img src="images/a2.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Wedding Blazers</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$129.99</span>
                        <del>$150.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men yes-marg">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/g1.png" alt="" class="pro-image-front">
                    <img src="images/g1.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Dresses</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$45.99</span>
                        <del>$69.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men yes-marg">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/g2.png" alt="" class="pro-image-front">
                    <img src="images/g2.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#"> Shirts</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$45.99</span>
                        <del>$69.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men yes-marg">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/g3.png" alt="" class="pro-image-front">
                    <img src="images/g3.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">Shirts</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$45.99</span>
                        <del>$69.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 product-men yes-marg">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img src="images/mw2.png" alt="" class="pro-image-front">
                    <img src="images/mw2.png" alt="" class="pro-image-back">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
                    <span class="product-new-top">New</span>

                </div>
                <div class="item-info-product ">
                    <h4><a href="#">T shirts</a></h4>
                    <div class="info-product-price">
                        <span class="item_price">$45.99</span>
                        <del>$69.71</del>
                    </div>
                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection