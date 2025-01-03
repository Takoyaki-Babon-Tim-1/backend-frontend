@extends('front.layouts.app')

@section('content')
    <div class="container max-w-lg px-6 py-10 mx-auto bg-white rounded-lg shadow-lg">
        <h1 class="mb-6 text-3xl font-bold text-center text-gray-800">Selesaikan Pembayaran</h1>

        <!-- Informasi Total Pembayaran -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-600">Total Pembayaran</h3>
            <p class="mt-2 text-3xl font-bold text-black">
                Rp {{ number_format($totalPrice, 0, ',', '.') }}
            </p>
        </div>

        <!-- Tombol Bayar Sekarang -->
        <div class="flex justify-center">
            <button id="pay-button"
                class="px-6 py-3 text-lg font-semibold text-gray-900 transition duration-300 transform bg-[#EBF400] rounded-full shadow-lg hover:bg-[#EBF400] hover:scale-105">
                Bayar Sekarang
            </button>
        </div>

        <!-- Footer -->
        <div class="mt-6 text-sm text-center text-gray-500">
            <p>Proses pembayaran aman dan mudah menggunakan Midtrans.</p>
        </div>
    </div>


    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    // Tampilkan SweetAlert jika pembayaran berhasil
                    Swal.fire({
                        title: 'Pembayaran Berhasil!',
                        text: 'Terima kasih, pembayaran Anda telah diterima.',
                        icon: 'success',
                        iconColor: '#EBF400', // Mengganti warna ikon
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#EBF400',
                        customClass: {
                            title: 'text-2xl font-bold text-[#EBF400]',
                            content: 'text-lg text-text-gray-900',
                            confirmButton: 'py-2 px-4 rounded-full text-white bg-[#EBF400] hover:bg-[#EBF400]'
                        }
                    }).then(function() {
                        // Redirect ke halaman setelah SweetAlert ditutup
                        window.location.href = "/";
                    });

                    console.log(result);
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                    console.log(result);
                },
                onClose: function() {
                    alert('Anda menutup pop-up tanpa menyelesaikan pembayaran');
                }
            });
        });
    </script>
@endsection
