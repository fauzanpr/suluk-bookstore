@extends('admin.layout.masterlayout')

@section('content')

<div class="container">
    <h5 class="overview-title mb-3 ps-0">
        <span class="border-3 border-bottom border-primary">List Data Transaksi</span>
    </h5>

    <!-- btn cetak -->
    <a class="d-grid gap-2 d-md-flex justify-content-md-end" href="{{ route('kelolatransaksi.cetak') }}" target="_blank" style="text-decoration: none">
        <button type="button" class="btn btn-danger mt-4"><i class="las la-print"> </i> Cetak Laporan</button>
    </a>
    <!-- btn cetak -->

    <!-- Table Transaksi -->
    <div class="container-fluid mt-4">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="background-color: #4f46ba; color: #fff">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">pelanggan</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                    dd($transactions);
                    @endphp --}}
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->transaction_date }}</td>
                        <td>{{ $transaction->price_total }}</td>
                        <td>{{ $transaction->transaction_status }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" type="button" title="Edit"
                                data-bs-toggle="modal" data-bs-target="#edittransaksi{{ $transaction->id }}">
                                <i class="las la-edit"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal edit Transaksi -->
                    <!-- Scrollable modal -->
                    <form action="{{ route('kelolatransaksi.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal fade" id="edittransaksi{{ $transaction->id }}" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
                            aria-hidden="true" data-bs-backdrop="false">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Status Transaksi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">

                                            <h6>BUKTI TRANSFER</h6>
                                            <img src="{{ asset('storage/'.$transaction->transfer_proof) }}" class="rounded mx-auto d-block img-fluid mb-5" alt="..." style="max-width: 350px;">

                                            <h6 class="mb-4">DATA TRANSAKSI</h6>
                                            <div class="mb-3 row">
                                                <div class="col-sm-4">
                                                    <p>ID Pelanggan</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>: {{ $transaction->user->id }}</p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-4">
                                                    <p>Nama Pelanggan</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>: {{ $transaction->user->name }}</p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-4">
                                                    <p>Tanggal Transaksi</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>: {{ $transaction->transaction_date }}</p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-4">
                                                    <p>Total Item</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>: {{ $transaction->item_total }}</p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-4">
                                                    <p>Total Harga</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>: {{ $transaction->price_total }}</p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="Status" class="col-sm-4 col-form-label">Status Transaksi</label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" name="transaction_status">
                                                        <option value="{{ $transaction->transaction_status }}">{{ $transaction->transaction_status }}</option>
                                                        <option value="payyed">payyed</option>
                                                        <option value="success">success</option>
                                                        <option value="fail">fail</option>
                                                    </select>
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
                                                    @if($detil->transaction_id == $transaction->id)
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
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">SIMPAN</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <!-- Modal Edit Transaksi end -->

                    @endforeach

                </tbody>
            </table>

            {!! $transactions->links() !!}
        </div>
    </div>
    <!-- Table Transaksi end -->
</div>

@endsection