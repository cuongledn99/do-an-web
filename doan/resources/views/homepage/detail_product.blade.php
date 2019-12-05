@extends('layouts.homepage')
@section('content')
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>Single</h3>
    </div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
    <div class="container">
        <div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s"
            style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <!-- FlexSlider -->
                    <script>
                        // Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
                    </script>
                    <!-- //FlexSlider-->
                    <ul class="">
                        <div class="thumb-image"> <img src="{{$product->image}}" data-imagezoom="true"
                            class="img-responsive"> </div>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" style="margin-top: 10%;"
            data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
            <h3>{{$product->name}}</h3>
            <p><span class="item_price">{{number_format($product->inPrice)}} đ</span> <del>{{number_format($product->outPrice)}}đ</del></p>
            <div class="occasion-cart">
                <a href="#" class="item_add hvr-outline-out button2" onclick="addToCart({{$product->id}})">Add to cart</a>
            </div>

        </div>
        <div class="clearfix"> </div>

        <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s"
            style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab"
                            aria-controls="home" aria-expanded="true">Description</a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab"
                            aria-controls="profile">Reviews(1)</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home"
                        aria-labelledby="home-tab">
                        <h5>Product Brief Description</h5>
                    <p>{{$product->description}}</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile"
                        aria-labelledby="profile-tab">
                        <div class="bootstrap-tab-text-grids">
                            <div class="bootstrap-tab-text-grid">
                                <div class="bootstrap-tab-text-grid-left">
                                    <img src="{{asset('images/men3.jpg')}}" alt=" " class="img-responsive">
                                </div>
                                <div class="bootstrap-tab-text-grid-right">
                                    <ul>
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-share"
                                                    aria-hidden="true"></span>Reply</a></li>
                                    </ul>
                                    <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                                        suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                        vel eum iure reprehenderit.</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="add-review">
                                <h4>add a review</h4>
                                <form>
                                    <input type="text" value="Name" onfocus="this.value = '';"
                                        onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                    <input type="email" value="Email" onfocus="this.value = '';"
                                        onblur="if (this.value == '') {this.value = 'Email';}" required="">

                                    <textarea type="text" onfocus="this.value = '';"
                                        onblur="if (this.value == '') {this.value = 'Message...';}"
                                        required="">Message...</textarea>
                                    <input type="submit" value="SEND">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //single -->
@endsection