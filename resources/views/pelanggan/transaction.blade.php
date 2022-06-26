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
                    @foreach ($transactions as $t)
                        <tr>
                            <th scope="row">{{ $t->id }}</th>
                            <td>{{ $t->transaction_date }}</td>
                            <td>{{ $t->item_total }}</td>
                            <td>{{ $t->price_total }}</td>
                            <td>
                                <button title="detail" type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#detailtransaksi{{ $t->id }}" style="padding: 2px">
                                    <i class="las la-external-link-alt" style="color: white; font-size: 20px;"></i>
                                </button>
                            </td>
                            <td>
                                @if ($t->transaction_status == 'fail')
                                    <button class="btn btn-danger me-md-2 btn-sm" type="button" disabled>Gagal</button>
                                @endif

                                @if ($t->transaction_status == 'payyed')
                                    <button class="btn btn-primary me-md-2 btn-sm" type="button" disabled>Sudah
                                        Dibayar</button>
                                @endif

                                @if ($t->transaction_status == 'success')
                                    <button class="btn btn-success me-md-2 btn-sm" type="button" disabled>Berhasil</button>
                                @endif

                            </td>
                        </tr>

                        <!-- Modal detail Transaksi -->

                        <div class="modal fade" id="detailtransaksi{{ $t->id }}" tabindex="-1"
                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="max-height: 500px;margin-top: 10vh;">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">DETAIL TRANSAKSI</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">

                                            <h6>BUKTI TRANSFER</h6>
                                            <img src="{{ asset('storage/'.$t->transfer_proof) }}" class="rounded mx-auto d-block img-fluid mb-5"
                                                alt="..." style="max-width: 350px;">

                                            <h6 class="mb-4">DATA TRANSAKSI</h6>
                                            <div class="mb-3 row">
                                                <div class="col-sm-4">
                                                    <p>ID Transaksi</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>: {{ $t->id }}</p>
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
                                                    <p>: {{ $t->item_total }}</p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-4">
                                                    <p>Total Harga</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>: {{ $t->price_total }}</p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-4">
                                                    <p>Status</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>: {{ $t->transaction_status }}</p>
                                                </div>
                                            </div>

                                            <h6 class="mt-5 mb-4">DETAIL TRANSAKSI</h6>
                                            <!-- tabel detail buku -->
                                            <div class="container">
                                                <div class="row mb-2 p-2"style="background-color: #4f46ba; color: #fff" >
                                                    <div class="col">Sampul</div>
                                                    <div class="col">judul</div>
                                                    <div class="col">Harga Buku</div>
                                                    <div class="col">QTY</div>
                                                    <div class="col">Sub Total</div>
                                                </div>
                                                @foreach ($transactiondetil as $detil)
                                                    @if($detil->transaction_id == $t->id)
                                                        <div class="row mb-1">
                                                            <div class="col">
                                                                @if (is_null($detil->cover_photo))
                                                                <img src="{{ asset('images/product-01.jpg') }}" alt="" style="max-width: 60px;">
                                                                @else
                                                                <img src="{{ asset('storage/'.$detil->cover_photo) }}" alt="" style="max-width: 60px;">
                                                                @endif
                                                            </div>
                                                            <div class="col">{{ $detil->title }}</div>
                                                            <div class="col">{{ $detil->price }}</div>
                                                            <div class="col">{{ $detil->sub_item }}</div>
                                                            <div class="col">{{ $detil->sub_cost }}</div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <!-- tabel end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal detail Transaksi end -->
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    
@endsection
