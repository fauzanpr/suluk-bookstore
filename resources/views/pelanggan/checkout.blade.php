@extends('pelanggan.layout.masterlayout')

@section('content')
    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85 mt-5" method="POST" action="/totransaction" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <div class="container p-3">
                <div class="alert alert-info">
                    # Untuk pembayaran silahkan transfer ke rekening <b>BNI 5371 7600 0012 3456</b> atas nama <b>Fauzan
                        Pradana</b>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Buku</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">harga</th>
                                    <th class="column-4 text-center">jumlah</th>
                                    <th class="column-5">sub total</th>
                                </tr>
                                @php
                                    $item_total = 0;
                                    $price_total = 0;
                                @endphp
                                @foreach ($books as $book)
                                    {{-- chart item --}}
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                @if (is_null($book->book->cover_photo))
                                            <img src="images/product-01.jpg" alt="IMG">
                                            @else
                                            <img src="{{ asset('storage/'.$book->book->cover_photo) }}" alt="IMG">
                                            @endif
                                            </div>
                                        </td>
                                        <td class="column-2">{{ $book->Book->title }}</td>
                                        <td class="column-3">Rp{{ $book->Book->price }}</td>
                                        <td class="column-4 text-center">{{ $book->sub_item }}</td>
                                        <td class="column-5">Rp{{ $book->sub_cost }}</td>
                                    </tr>
                                    {{-- chart item end --}}
                                    @php
                                        $item_total += $book->sub_item;
                                        $price_total += $book->sub_cost;
                                    @endphp
                                @endforeach


                            </table>
                        </div>
                    </div>
                </div>

                {{-- form insert data transaksi --}}
                {{-- <form method="post" action="/totransaction" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Transaksi
                            </h4>

                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Bukti transfer
                                    </span>
                                </div>

                                <div class="size-209">
                                    <input type="file" class="mtext-110 cl2 form-control form-control-sm"
                                        name="bukti_transfer" required>
                                </div>
                            </div>

                            <div class="flex-w flex-t bor12 p-b-13 mt-3">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Item
                                    </span>
                                </div>

                                <div class="size-209">
                                    <input type="text" class="mtext-110 cl2" value=": {{ $item_total }}" name="total_item" disabled
                                        required>
                                </div>
                            </div>


                            <div class="flex-w flex-t bor12 p-b-13 mt-3">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Total Harga
                                    </span>
                                </div>

                                <div class="size-209">
                                    <input type="text" class="mtext-110 cl2" value=": {{ $price_total }}" name="total_item" disabled
                                        required>
                                </div>
                            </div>

                            <button type="submit"
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mt-5">
                                Checkout
                            </button>
                        </div>
                    </div>

                {{-- </form> --}}


            </div>
        </div>
    </form>
@endsection
