@extends('admin.layout.masterlayout')

@section('content')
<div class="container">
    <h5 class="overview-title mb-3 ps-0">
        <span class="border-3 border-bottom border-primary">List Akun Pelanggan</span>
    </h5>
    <!-- Table Aggota -->
    <div class="container-fluid mt-5">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="background-color: #4f46ba; color: #fff">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">NoHp</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Ahmad Rafif Alaudin</td>
                        <td>rafifayuzaki123@gmail.com</td>
                        <td>089620422007</td>
                        <td>
                            <button class="btn btn-warning btn-sm" type="button" title="Detail"
                                data-bs-toggle="modal" data-bs-target="#detailpelanggan">
                                <i class="las la-external-link-square-alt"></i>
                            </button>
                            <button class="btn btn-primary btn-sm" type="button" title="Edit"
                                data-bs-toggle="modal" data-bs-target="#editpelanggan">
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
    <!-- Table Anggota end -->

    <!-- Modal Pelanggan -->

    <!-- Detail -->
    <div class="modal fade" id="detailpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3" style="max-width: 800px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/profile.png" class="img-fluid rounded" alt="foto Profile">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <div class="col-sm-4">
                                            <p>Nama</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>: Ahmad Rafif Alaudin</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-4">
                                            <p>no.HP</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>: 089620422007</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-4">
                                            <p>Email</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>: rafifayuzaki123@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-4">
                                            <p>Password</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>: LiuKa34shi7*^</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-4">
                                            <p>Provinsi</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>: Jawa Timur</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-4">
                                            <p>Kota / Kab</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>: Kediri</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-4">
                                            <p>Kecamatan</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>: Mojoroto</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-4">
                                            <p>Alamat</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>: Jalan In Aja Dulu Baru Temenan</p>
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
    <!-- Detail end -->

    <!-- Edit -->
    <div class="modal fade" id="editpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="mb-3" style="max-width: 700px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="img/profile.png" class="img-fluid rounded" alt="foto Profile">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="formFile" class="col-sm-5 col-form-label">Foto
                                                Profil</label>
                                            <div class="col-sm-7">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="formFile" name="profil_pelanggan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="ISBNf" class="col-sm-5 col-form-label">Nama</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm"
                                                    id="ISBNf" name="nama_pelanggan" value="Ahmad Rafif">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="judulf" class="col-sm-5 col-form-label">no.HP</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm"
                                                    id="judulf" name="noHp_pelanggan" value="089620422007">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pengarangf"
                                                class="col-sm-5 col-form-label">Email</label>
                                            <div class="col-sm-7">
                                                <input type="email" class="form-control form-control-sm"
                                                    id="pengarangf" name="email_pelanggan"
                                                    value="rafifayuzaki123@gmail.com">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="penerbitf"
                                                class="col-sm-5 col-form-label">Password</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm"
                                                    id="penerbitf" name="password_pelanggan"
                                                    value="PT. Gramedia">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="provinsif"
                                                class="col-sm-5 col-form-label">Provinsi</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm"
                                                    id="provinsif" name="provinsi" value="Jawa Timur">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="kotaf" class="col-sm-5 col-form-label">Kota</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm"
                                                    id="kotaf" name="kota" value="Kediri">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="kecamatanf"
                                                class="col-sm-5 col-form-label">Kecamatan</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm"
                                                    id="kecamatanf" name="kecamatan" value="Mojoroto">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamatf" class="col-sm-5 col-form-label">Alamat</label>
                                            <div class="col-sm-7">
                                                <textarea type="text" class="form-control form-control-sm"
                                                    id="alamatf" name="alamat" value="PT. Gramedia"></textarea>
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
    <!-- Edit end -->


    <!-- Modal Pelanggan end-->
</div>
@endsection