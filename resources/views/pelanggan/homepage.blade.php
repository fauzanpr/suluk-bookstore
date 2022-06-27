@extends('pelanggan.layout.masterlayout')

@if (session()->has('adminLoginError'))
    <script>
        alert("anda bukan admin")
    </script>
@endif
@if (session()->has('errorAddChart'))
    <script>
        alert("STOK TIDAK CUKUP!")
    </script>
@endif

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
                                <a href="#shop"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
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
                                <a href="shop"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
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
    <section class="bg0 p-t-23 p-b-140 mt-5" id='shop'>
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

                    @foreach ($categories as $category)
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                            data-filter=".{{ $category->category_name }}">
                            {{ $category->category_name }}
                        </button>
                    @endforeach


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

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                            placeholder="Search">
                    </div>
                </div>

            </div>

            <div class="row isotope-grid">
                @foreach ($books as $book)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $book->category->category_name }}">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                @if (is_null($book->cover_photo))
                                    <img src="images/product-01.jpg" alt="IMG-PRODUCT">
                                @else
                                    <img src="{{ asset('storage/' . $book->cover_photo) }}" alt="IMG-PRODUCT">
                                @endif

                                <a class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 {{-- js-show-modal1 --}}"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $book->id }}">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $book->title }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        Rp. {{ $book->price }}
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                            alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal{{ $book->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:10vh;">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                @if (is_null($book->cover_photo))
                                                    <img src="images/product-01.jpg" class="img-fluid rounded-start"
                                                        alt="foto sampul" style="max-height: 500px">
                                                @else
                                                    <img src="{{ asset('storage/' . $book->cover_photo) }}"
                                                        class="img-fluid rounded-start" alt="foto sampul"
                                                        style="max-height: 500px">
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <div class="mb-1 row">
                                                        <label for="ISBNf" class="col-sm-5 col-form-label">ISBN</label>
                                                        <div class="col-sm-7">
                                                            <p>{{ $book->isbn }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <label for="judulf" class="col-sm-5 col-form-label">Judul
                                                            Buku</label>
                                                        <div class="col-sm-7">
                                                            <p>{{ $book->title }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <label for="pengarangf"
                                                            class="col-sm-5 col-form-label">Pengarang</label>
                                                        <div class="col-sm-7">
                                                            <p>{{ $book->author }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <label for="penerbitf"
                                                            class="col-sm-5 col-form-label">penerbit</label>
                                                        <div class="col-sm-7">
                                                            <p>{{ $book->publisher }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <label for="hargaf"
                                                            class="col-sm-5 col-form-label">harga</label>
                                                        <div class="col-sm-7">
                                                            <p>{{ $book->price }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <label for="stokf"
                                                            class="col-sm-5 col-form-label">Stock</label>
                                                        <div class="col-sm-7">
                                                            <p>{{ $book->stock }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <label for="kategorif"
                                                            class="col-sm-5 col-form-label">kategori</label>
                                                        <div class="col-sm-7">
                                                            <p>{{ $book->category->category_name }}</p>
                                                        </div>
                                                    </div>

                                                    {{-- form tambah chart --}}
                                                    <form method="post" action="/chart/add/{{ $book->id }}">
                                                        @csrf
                                                        <div class="flex-w flex-r-m p-b-10 mt-3">
                                                            <div class="size-204 flex-w flex-m respon6-next">
                                                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                                    <div
                                                                        class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                                    </div>

                                                                    <input class="mtext-104 cl3 txt-center num-product"
                                                                        type="number" name="num_product" value="1">

                                                                    <div
                                                                        class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                                    </div>
                                                                </div>

                                                                <button
                                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
                                                                    type="submit">
                                                                    Add to cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Load more -->
            </div>



            {{ $paginate->links() }}

        </div>
    </section>
@endsection
