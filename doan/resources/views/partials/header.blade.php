<!-- header -->

<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="/"><img src="{{asset('images/logo3.jpg')}}"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form method="GET" action="/search">
				<div class="search">
					<input type="search" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				@if(Auth::check())
					<li>
						<div class="dropdown">
							<a class="dropdown-toggle use1" type="button" data-toggle="dropdown"></a>
							<ul class="dropdown-menu">
								{{-- <li><a href="#">{{Auth::user()->username}}</a></li> --}}
								<li><a href="#">Change Password</a></li>
								<li><a id="logout-user">Log Out</a></li>
							</ul>
						</div>
					<li>
				@else
					<li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a></li>
				@endif
				<li><a class="fb" href="#"></a></li>
				<li><a class="twi" href="#"></a></li>
				<li><a class="insta" href="#"></a></li>
				<li><a class="you" href="#"></a></li>
			</ul>
		</div>
		
		<div class="clearfix"></div>
		
	</div>
</div>





{{-- modal infor user --}}

	  