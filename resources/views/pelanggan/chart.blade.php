@extends('pelanggan.layout.masterlayout')

@section('content')
<form class="bg0 p-t-75 p-b-85 mt-5">
    <div class="container">
        <div class="row">

            

            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <h3 class="mb-5 mt-5">Keranjang Saya</h3>
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">Product</th>
                            <th class="column-2"></th>
                            <th class="column-3">Price</th>
                            <th class="column-4 text-center">Qty</th>
                            <th class="column-5">Total</th>
                            <th class="column-5">Action</th>
                        </tr>

                        <tr class="table_row">
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img src="images/product-01.jpg" alt="IMG">
                                </div>
                            </td>
                            <td class="column-2">Fresh Strawberries</td>
                            <td class="column-3">$ 36.00</td>
                            <td class="column-4">
                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="column-5">$ 36.00</td>
                            <td class="column-5"><i class="zmdi zmdi-close-circle zmd-fw"></i></td>
                        </tr>

                    </table>
                </div>

                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                        Checkout
                    </button>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection