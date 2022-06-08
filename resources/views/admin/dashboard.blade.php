@extends('admin.layout.masterlayout')

@section('content')
<div class="row">
    <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase">Dashboard Admin</h4>
        <p>Hi! Fauzan Pradana</p>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center me-3">
                            <i class="las la-comments-dollar" style="font-size:5rem"></i>
                        </div>
                        <div class="media-body text-right align-self-center">
                            <h3>Rp. 3000000</h3>
                            <span>Total Transaksi Bulan Ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center me-3">
                            <i class="las la-dolly-flatbed" style="font-size:5rem"></i>
                        </div>
                        <div class="media-body text-right align-self-center">
                            <h3>30</h3>
                            <span>Jumlah Transaksi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center me-3">
                            <i class="las la-book" style="font-size:5rem"></i>
                        </div>
                        <div class="media-body text-right align-self-center">
                            <h3>42</h3>
                            <span>Jumlah Buku</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center me-3">
                            <i class="las la-users float-left" style="font-size:5rem"></i>
                        </div>
                        <div class="media-body text-right align-self-center">
                            <h3>278</h3>
                            <span>Jumlah Akun Pelanggan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection