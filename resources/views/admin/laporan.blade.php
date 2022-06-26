<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan Transaksi</title>
</head>

<body>
    <div class="container mt-5">
        <div>
            <span>
                Laporan Transaksi
                <br>
                <h5>SULUK BOOK STORE</h5>
            </span>
            <span>
                {{ date('Y-m-d H:i:s') }}
            </span>
        </div>
        <hr>
        <div class="container mt-3">
            <table class="table table-sm">
                <thead style="background-color: rgb(255, 246, 235);">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Item</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $t)
                    <tr>
                        <th scope="row">{{ $t->id }}</th>
                        <td style="text-align:center">{{ $t->user->name}}</td>
                        <td style="text-align:center">{{ $t->item_total }}</td>
                        <td style="text-align:center">Rp. {{ $t->price_total }}</td>
                        <td style="text-align:center">{{ $t->transaction_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p>Total Pendapatan : {{ $total }}</p>
        </div>
    </div>



</body>

</html>