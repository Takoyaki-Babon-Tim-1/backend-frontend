<!DOCTYPE html>
<html>

<head>
    <title>Notifikasi Pembayaran</title>
</head>

<body>
    <p>Halo Admin,</p>
    <p>Sebuah pembayaran baru telah berhasil dilakukan.</p>
    <p><strong>ID Pesanan:</strong> {{ $order_id }}</p>
    <p><strong>Total Harga:</strong> Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
    <p><strong>Pelanggan:</strong> {{ $user->name }} ({{ $user->email }})</p>
    <p>Salam hormat, <br>Perusahaan Anda</p>
</body>

</html>
