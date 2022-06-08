@extends('admin.layout.masterlayout')

@section('content')
<div class="container">
    <h5 class="overview-title mb-3 ps-0">
        <span class="border-3 border-bottom border-primary">List Data Transaksi</span>
    </h5>

    <!-- btn cetak -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-danger mt-4"><i class="las la-print"> </i> Cetak Laporan</button>
    </div>
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

                    <tr>
                        <td>1</td>
                        <td>Ahmad Rafif Alaudin</td>
                        <td>06/06/2022</td>
                        <td>280000</td>
                        <td>Proses</td>
                        <td>
                            <button class="btn btn-primary btn-sm" type="button" title="Edit"
                                data-bs-toggle="modal" data-bs-target="#edittransaksi">
                                <i class="las la-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" type="button" title="Hapus">
                                <i class="las la-trash-alt"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <!-- Table Transaksi end -->

    <!-- Modal -->

    <!-- Modal edit Transaksi -->
    <!-- Scrollable modal -->
    <form action="" method="POST">

        <div class="modal fade" id="edittransaksi" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
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
                            <img src="img/buktitf/bukti.jpg" class="rounded mx-auto d-block img-fluid mb-5"
                                alt="..." style="max-width: 350px;">

                            <h6 class="mb-4">DATA TRANSAKSI</h6>
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <p>ID Pelanggan</p>
                                </div>
                                <div class="col-sm-8">
                                    <p>: 1</p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <p>Nama Pelanggan</p>
                                </div>
                                <div class="col-sm-8">
                                    <p>: Ahmad Rafif Alaudin</p>
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
                                <label for="Status" class="col-sm-4 col-form-label">Status Transaksi</label>
                                <div class="col-sm-8">
                                    <select class="form-select" name="status_transaksi">
                                        <option value="Proses">Proses</option>
                                        <option value="Berhasil">Berhasil</option>
                                        <option value="Gagal">Gagal</option>
                                    </select>
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
                                                <img src="img/buku.png"
                                                    class="rounded mx-auto d-block img-fluid" alt="sampul"
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <!-- Modal Edit Transaksi end -->

    <!-- Modal end -->
</div>
@endsection