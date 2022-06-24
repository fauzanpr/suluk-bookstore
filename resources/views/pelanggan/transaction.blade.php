@extends('pelanggan.layout.masterlayout')

@section('content')
    <div class="container" style="min-height: 70vh; margin-top: 16vh;">
        <h2 class="mt-5 p-3">Riwayat Transaksi</h2>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Tgl Transakasi</th>
                        <th scope="col">Total Item</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction as $t)
                        <tr>
                            <th scope="row">{{ $t->id }}</th>
                            <td>{{ $t->transaction_date }}</td>
                            <td>{{ $t->item_total }}</td>
                            <td>{{ $t->price_total }}</td>
                            <td>
                                <button title="detail" type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#detailtransaksi" style="padding: 2px">
                                    <i class="las la-external-link-alt" style="color: white; font-size: 20px;"></i>
                                </button>
                            </td>
                            <td>
                                @if ($t->transaction_status == 'gagal')
                                    <button class="btn btn-danger me-md-2 btn-sm" type="button" disabled>Gagal</button>
                                @endif

                                @if ($t->transaction_status == 'prosess')
                                    <button class="btn btn-primary me-md-2 btn-sm" type="button" disabled>Proses</button>
                                @endif

                                @if ($t->transaction_status == 'berhasil')
                                    <button class="btn btn-success me-md-2 btn-sm" type="button" disabled>Berhasil</button>
                                @endif

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal detail Transaksi -->

    <div class="modal fade" id="detailtransaksi" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true" style="max-height: 500px;margin-top: 10vh;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">DETAIL TRANSAKSI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <h6>BUKTI TRANSFER</h6>
                        <img src="img/buktitf/bukti.jpg" class="rounded mx-auto d-block img-fluid mb-5" alt="..."
                            style="max-width: 350px;">

                        <h6 class="mb-4">DATA TRANSAKSI</h6>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <p>ID Transaksi</p>
                            </div>
                            <div class="col-sm-8">
                                <p>: 1</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <p>Tgl Transaksi</p>
                            </div>
                            <div class="col-sm-8">
                                <p>: 26/06/2022</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <p>Total Item</p>
                            </div>
                            <div class="col-sm-8">
                                <p>: 5</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <p>Total Harga</p>
                            </div>
                            <div class="col-sm-8">
                                <p>: 210000</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <p>Status</p>
                            </div>
                            <div class="col-sm-8">
                                <p>: Proses</p>
                            </div>
                        </div>

                        <h6 class="mt-5 mb-4">DETAIL TRANSAKSI</h6>
                        <!-- tabel detail buku -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background-color: #4f46ba; color: #fff">
                                    <tr>
                                        <th scope="col">Sampul</th>
                                        <th scope="col">Harga Buku</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <img src="img/buku.png" class="rounded mx-auto d-block img-fluid" alt="sampul"
                                                style="max-width: 80px;">
                                        </td>
                                        <td>90000</td>
                                        <td>3</td>
                                        <td>280000</td>
                                    </tr>

                                </tbody>
                            </table>
                            <!-- tabel end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal detail Transaksi end -->
@endsection
