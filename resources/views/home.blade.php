<!DOCTYPE html>
<html>
<head>
    <title>Halaman Beranda</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="{{ route('customer') }}">Customer</a></li>
        <li><a href="{{ route('kendaraan') }}">Kendaraan</a></li>
        <li><a href="{{ route('order') }}">Order</a></li>
    </ul>
    <h1>Selamat datang di Aplikasi Kami</h1>
    <p>Ini adalah halaman beranda aplikasi kami.</p>

    <!-- Tombol untuk menambahkan Customer -->
    <a href="{{ route('customer') }}" class="btn btn-primary">Tambah Customer</a>

    <!-- Tombol untuk menambahkan Kendaraan -->
    <a href="{{ route('kendaraan') }}" class="btn btn-primary">Tambah Kendaraan</a>

    <!-- Tombol untuk menambahkan Order -->
    <a href="{{ route('order') }}" class="btn btn-primary">Tambah Order</a>
</body>
</html>
