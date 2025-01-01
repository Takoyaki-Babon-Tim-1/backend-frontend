@extends('front.layouts.app')
@section('content')
    <div class="px-5 my-[30px] ">
        <div class="flex items-center justify-between w-full px-3 mb-8">
            <a href="/my-profile">
                <div
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-[#EBF400] transition-all duration-300 ">
                    <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="object-contain w-5 h-5" alt="icon">
                </div>
            </a>
            <h1 class="text-2xl font-bold ">Kebijakan Layanan</h1>
            <span class="max-w-none"></span>
        </div>
        <div class="px-3 text-justify">
            <p class="mb-4 text-gray-800">
                Selamat datang di Takoyaki Babon. Sebelum menggunakan layanan kami, harap baca Kebijakan Layanan ini dengan
                seksama. Dengan menggunakan layanan kami, Anda setuju untuk mematuhi ketentuan yang tercantum di sini.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">1. Penerimaan Ketentuan</h2>
            <p class="mb-4 text-gray-800">
                Dengan mengakses atau menggunakan layanan kami, Anda setuju untuk terikat oleh syarat dan ketentuan dalam
                Kebijakan Layanan ini. Jika Anda tidak setuju dengan ketentuan ini, harap tidak menggunakan layanan kami.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">2. Penggunaan Layanan</h2>
            <p class="mb-4 text-gray-800">
                Anda setuju untuk menggunakan layanan kami hanya untuk tujuan yang sah dan sesuai dengan hukum yang berlaku.
                Anda tidak diperbolehkan menggunakan layanan kami untuk kegiatan yang melanggar hukum, merugikan pihak
                ketiga, atau mengganggu operasional layanan.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">3. Akun Pengguna</h2>
            <p class="mb-4 text-gray-800">
                Anda dapat diminta untuk membuat akun untuk menggunakan beberapa layanan kami. Pastikan informasi yang Anda
                berikan akurat dan terkini. Anda bertanggung jawab untuk menjaga kerahasiaan informasi akun dan semua
                aktivitas yang terjadi di akun Anda.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">4. Pembayaran dan Pesanan</h2>
            <p class="mb-4 text-gray-800">
                Semua transaksi pembayaran harus dilakukan melalui metode yang kami sediakan. Kami berhak untuk membatalkan
                pesanan jika ditemukan pelanggaran atau masalah dengan pembayaran.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">5. Perubahan Layanan</h2>
            <p class="mb-4 text-gray-800">
                Kami berhak untuk mengubah, menghentikan, atau menangguhkan layanan kami kapan saja, dengan atau tanpa
                pemberitahuan sebelumnya. Kami tidak bertanggung jawab atas kerugian yang timbul akibat perubahan tersebut.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">6. Hak Cipta dan Kepemilikan</h2>
            <p class="mb-4 text-gray-800">
                Semua konten, termasuk tetapi tidak terbatas pada desain, teks, gambar, dan logo, adalah milik Takoyaki
                Babon dan dilindungi oleh hak cipta. Anda tidak diperbolehkan menggunakan konten ini tanpa izin tertulis
                dari kami.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">7. Pembatasan Tanggung Jawab</h2>
            <p class="mb-4 text-gray-800">
                Takoyaki Babon tidak bertanggung jawab atas kerugian langsung, tidak langsung, insidental, atau
                konsekuensial yang timbul dari penggunaan layanan kami, termasuk tetapi tidak terbatas pada kehilangan data,
                kehilangan keuntungan, atau gangguan bisnis.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">8. Perubahan Kebijakan</h2>
            <p class="mb-4 text-gray-800">
                Kami dapat memperbarui Kebijakan Layanan ini dari waktu ke waktu. Setiap perubahan akan dipublikasikan di
                situs kami, dan versi terbaru akan berlaku segera setelah dipublikasikan.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">9. Kontak</h2>
            <p class="mb-4 text-gray-800">
                Jika Anda memiliki pertanyaan tentang Kebijakan Layanan ini, silakan hubungi kami di:
            </p>
            <p class="text-gray-800">
                Email: <a href="mailto:support@takoyakibabon.com"
                    class="text-blue-500 hover:underline">support@takoyakibabon.com</a>
            </p>
        </div>
    </div>
@endsection
