@extends('admin.layout.masterlayout')

@section('content')
<div class="container">
    <h5 class="overview-title mb-3 ps-0">
        <span class="border-3 border-bottom border-primary">List Data Buku</span>
    </h5>
    <!-- btn tambah buku -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
            data-bs-target="#tambahbuku">
            Tambah Data Buku
        </button>
    </div>

    <!-- list buku wrapper -->
    <div class="container-fluid overflow-auto" style="height: 35vw;">
        <div class="row justify-content-start">
            <!-- card-item-buku -->
            <div class="col-auto">
                <div class="card text-dark bg-light mb-3" style="max-width: 10rem;">
                    <div class="card-header">
                        <button class="btn btn-warning btn-sm" type="button" title="Detail"
                            data-bs-toggle="modal" data-bs-target="#detailbuku">
                            <i class="las la-external-link-square-alt"></i>
                        </button>
                        <button class="btn btn-primary btn-sm" type="button" title="Edit" data-bs-toggle="modal"
                            data-bs-target="#editbuku">
                            <i class="las la-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" type="button" title="Hapus">
                            <i class="las la-trash-alt"></i>
                        </button>
                    </div>
                    <div class="card-body  mx-auto" style="padding: 0 0 !important;">
                        <img src="img/buku.png" class="img-responsive" alt="Foto Buku"
                            style="max-width: 150px;">
                    </div>
                </div>
            </div>
            <!-- card-item-buku end -->


        </div>
    </div>

</div>

<!-- Modal -->

<!-- Modal Tambah data Buku -->
<div class="modal fade" id="tambahbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="formFile" class="col-sm-5 col-form-label">Foto Sampul Buku</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm" type="file" id="formFile"
                                name="foto_sampul" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ISBNf" class="col-sm-5 col-form-label">ISBN</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" id="ISBNf" required
                                name="ISBN">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judulf" class="col-sm-5 col-form-label">Judul Buku</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" id="judulf" required
                                name="judul">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pengarangf" class="col-sm-5 col-form-label">Pengarang</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" id="pengarangf" required
                                name="pengarang">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penerbitf" class="col-sm-5 col-form-label">penerbit</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" id="penerbitf" required
                                name="penerbit">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hargaf" class="col-sm-5 col-form-label">harga</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" id="hargaf" required
                                name="harga">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah data Buku -->

<!-- Modal Detail data Buku -->
<div class="modal fade" id="detailbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="false">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3" style="max-width: 700px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/buku.png" class="img-fluid rounded-start" alt="foto sampul">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="ISBNf" class="col-sm-5 col-form-label">ISBN</label>
                                    <div class="col-sm-7">
                                        <p>9780062641540</p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="judulf" class="col-sm-5 col-form-label">Judul Buku</label>
                                    <div class="col-sm-7">
                                        <p>Seni Bersikap Bodo Amat</p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="pengarangf" class="col-sm-5 col-form-label">Pengarang</label>
                                    <div class="col-sm-7">
                                        <p>Mark Manson</p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="penerbitf" class="col-sm-5 col-form-label">penerbit</label>
                                    <div class="col-sm-7">
                                        <p>PT. Gramedia</p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="hargaf" class="col-sm-5 col-form-label">harga</label>
                                    <div class="col-sm-7">
                                        <p>97000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal Detail data Buku -->

<!-- Modal edit data Buku -->
<div class="modal fade" id="editbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="false">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="mb-3" style="max-width: 700px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/buku.png" class="img-fluid rounded-start" alt="foto sampul">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="formFile" class="col-sm-5 col-form-label">Sampul</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm" type="file"
                                                id="formFile" name="foto_sampul" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="ISBNf" class="col-sm-5 col-form-label">ISBN</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control form-control-sm" id="ISBNf"
                                                required name="ISBN" value="9780062641540">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="judulf" class="col-sm-5 col-form-label">Judul Buku</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control form-control-sm" id="judulf"
                                                required name="judul" value="Seni Bersikap Bodo Amat">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="pengarangf"
                                            class="col-sm-5 col-form-label">Pengarang</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control form-control-sm"
                                                id="pengarangf" required name="pengarang" value="Mark Manson">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="penerbitf" class="col-sm-5 col-form-label">penerbit</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control form-control-sm"
                                                id="penerbitf" required name="penerbit" value="PT. Gramedia">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="hargaf" class="col-sm-5 col-form-label">harga</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control form-control-sm" id="hargaf"
                                                required name="harga" value="97000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal edit data Buku -->
@endsection