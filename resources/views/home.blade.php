<!DOCTYPE html>
<html>
<head>
    <title>Halaman Beranda</title>
</head>
<body>
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
