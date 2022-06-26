<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- CSS Navbar dan Layouts -->
    <link rel="stylesheet" href="{{ asset('admin/admin.css') }}" />

    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />

    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin | {{ $title }}</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="icon">
                <img src="{{ asset('admin/img/logo.jpeg') }}" alt="" width="28px" />
            </i>
            <div class="logo_name">
                <h2>SULUK</h2>
                <h6>BOOK STORE</h6>
            </div>
            <i class="las la-bars" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li class="{{ $title == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="las la-home"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li class="{{ $title == 'kelolabuku' ? 'active' : '' }}">
                <a href="{{ route('kelolabuku.tampil') }}">
                    <i class="las la-book"></i>
                    <span class="links_name">Kelola Data Buku</span>
                </a>
                <span class="tooltip">Kelola Data Buku</span>
            </li>
            <li class="{{ $title == 'kelolatransaksi' ? 'active' : '' }}">
                <a href="{{ route('kelolatransaksi.index') }}">
                    <i class="las la-comment-dollar"></i>
                    <span class="links_name">Kelola Data Transaksi</span>
                </a>
                <span class="tooltip">Kelola Data Transaksi</span>
            </li>
            <li class="{{ $title == 'kelolapelanggan' ? 'active' : '' }}">
                <a href="{{ route('kelolapelanggan.index') }}">
                    <i class="las la-user-circle"></i>
                    <span class="links_name">Kelola Akun Pelanggan</span>
                </a>
                <span class="tooltip">Kelola Akun Pelanggan</span>
            </li>


            <li class="profile">
                <div class="profile-details"  data-bs-toggle="modal" data-bs-target="#editprofil">
                    @if (is_null(auth()->user()->photo))
                    <img src="{{ asset('images/profile.png') }}" alt="pp">
                    @else
                    <img src="{{ asset('storage/'.auth()->user()->photo) }}" alt="pp">
                    @endif

                    <div class="name_job">
                        <div class="name">{{ auth()->user()->name }}</div>
                        <div class="job">Admin</div>
                    </div>
                </div>
                <i class="las la-sign-out-alt" id="log_out"></i>
            </li>
        </ul>
    </div>

    <!-- EDIT HERE -->
    <section class="home-section p-4">
        {{-- @php
        dd(auth()->user());
        @endphp --}}
        @yield('content')
    </section>

    {{-- modal edit profile --}}
    <form action="{{ route('profiladmin.update', auth()->user()->id) }}" method="POST" enctype="multipart/form">
        @csrf
        @method('PUT')
        <div class="modal fade" id="editprofil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (is_null(auth()->user()->photo))
                    <img src="{{ asset('images/profile.png') }}" class="rounded mx-auto d-block img-fluid mt-4 mb-2" alt="..." style="max-width: 200px;">
                    @else
                    <img src="{{ asset('storage/'.auth()->user()->photo) }}" class="rounded mx-auto d-block img-fluid mt-4 mb-2" alt="..." style="max-width: 200px;">
                    @endif
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="floatingInput" name="photo">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="name" value="{{ auth()->user()->name }}" required>
                        <label for="floatingInput">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="telp" value="{{ auth()->user()->telp }}" required>
                        <label for="floatingInput">Nomor Handphone</label>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
              </div>
            </div>
        </div>
    </form>
    {{-- end modal --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <!-- Custom js for DASHBOARD ADMIN -->
    <script src="{{ asset('admin/admin.js') }}"></script>
</body>

</html>