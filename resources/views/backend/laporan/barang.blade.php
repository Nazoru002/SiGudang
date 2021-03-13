<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>Sistem Aplikasi {{ env('APP_NAME') }}</title>

    <style>
        .header {
            margin-bottom: 50px;

        }
    </style>
</head>
<body>
    <div class="header">
        <h5 class="header">
                Master Data Barang
            
            <div class="float-right" style="display: block;">
                <h6>Pembuat Laporan : {{ auth()->user()->name }}</h6>
                <h6>Tanggal Print : {{ $date }}</h6>
            </div>
        </h5>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Deskripsi</th>
                        <th>Nama Kategori Barang</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($barang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description == null ? 'Tidak ada Deskripsi': $item->description  }}</td>
                        <td>{{ $item->category->name}}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">Belum Ada Data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
