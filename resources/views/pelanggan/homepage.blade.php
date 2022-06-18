@extends('pelanggan.layout.masterlayout')

@section('content')
<!-- Slider (jombootron) -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1" style="background-image: url(images/slide-01.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Suluk Book Store Products
							</span>
						</div>
							
						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								GET NOW!
							</h2>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(images/slide-02.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Kids Book 2022
							</span>
						</div>
							
						<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								Dale Mueller
							</h2>
						</div>
							
						<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
							<a href="#" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(images/slide-03.png);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Book Collection 2022
							</span>
						</div>
							
						<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								New arrivals
							</h2>
						</div>
							
						<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
							<a href="#" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Product -->
<section class="bg0 p-t-23 p-b-140 mt-5">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				Product Suluk Book Store
			</h3>
		</div>

		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Products
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
					Novel
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
					Pengetahuan
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
					Filsafat
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
					Komputer
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
					cerita
				</button>
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>
			
			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
				</div>	
			</div>

		</div>

		<div class="row isotope-grid">

			<!-- Book card -->
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="images/product-01.jpg" alt="IMG-PRODUCT">

						<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Quick View
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								JUDUL BUKU
							</a>

							<span class="stext-105 cl3">
								Rp. 30.000
							</span>
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Book card end-->

		</div>

		<!-- Load more -->
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Load More
			</a>
		</div>
	</div>
</section>

<!-- Modal Add Cart-->
<form action="" method="get">

	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>
	
		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>
	
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
	
								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-01.jpg" alt="IMG-PRODUCT" style="max-height:500px; object-fit: contain;">
	
											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
	
								</div>
							</div>
						</div>
					</div>
	
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Shatter Me
							</h4>
	
							<span class="mtext-106 cl2">
								Rp. 70.000
							</span>
	
							
							<div class="container-fluid p-0 mt-5">
								<h6 class="mb-3">DETAILS PRODUCT</h6>
								<div class="row mb-2">
									<div class="col-2">ISBN</div>
									<div class="col-2" style="width:20px;">:</div>
									<div class="col-6">2988373849</div>
								</div>
								<div class="row mb-2">
									<div class="col-2">Pengarang</div>
									<div class="col-2" style="width:20px;">:</div>
									<div class="col-6">Fauzan Pradana</div>
								</div>
								<div class="row mb-2">
									<div class="col-2">Penerbit</div>
									<div class="col-2" style="width:20px;">:</div>
									<div class="col-6">Gramedia</div>
								</div>
								<div class="row mb-2">
									<div class="col-2">Stock</div>
									<div class="col-2" style="width:20px;">:</div>
									<div class="col-6">30</div>
								</div>
								<div class="row mb-2">
									<div class="col-2">Kategori</div>
									<div class="col-2" style="width:20px;">:</div>
									<div class="col-6">Novel</div>
								</div>
							</div>
							
							<div class="flex-w flex-r-m p-b-10 mt-4">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>
	
										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">
	
										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
	
									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" type="submit">
										Add to cart
									</button>
								</div>
							</div>	
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>

@endsection