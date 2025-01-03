@extends('front.layouts.app')
@section('content')
    <div class="px-5 my-[30px]  ">
        <div class="flex items-center justify-between w-full px-3 mb-8">
            <a href="/my-profile">
                <div
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-[#EBF400] transition-all duration-300 xamp">
                    <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="object-contain w-5 h-5" alt="icon">
                </div>
            </a>
            <h1 class="text-2xl font-bold ">Kebijakan Privasi</h1>
            <span class="max-w-none"></span>
        </div>
        <div class="px-3 text-justify">
            <p class="mb-4 text-gray-800">
                Kami di Takoyaki Babon sangat menghargai privasi Anda dan berkomitmen untuk melindungi informasi pribadi
                yang Anda berikan saat menggunakan layanan kami. Kebijakan ini menjelaskan bagaimana kami mengumpulkan,
                menggunakan, dan melindungi data Anda.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">1. Informasi yang Kami Kumpulkan</h2>
            <p class="mb-4 text-gray-800">Kami mengumpulkan informasi berikut:</p>
            <ul class="pl-6 text-gray-700 list-disc">
                <li>Informasi pribadi, seperti nama, nomor telepon, dan alamat email, saat Anda melakukan pemesanan.</li>
                <li>Informasi transaksi, termasuk rincian pesanan dan metode pembayaran.</li>
                <li>Informasi teknis, seperti alamat IP dan data log, saat Anda mengakses situs kami.</li>
            </ul>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">2. Penggunaan Informasi</h2>
            <p class="mb-4 text-gray-800">Informasi yang kami kumpulkan digunakan untuk:</p>
            <ul class="pl-6 text-gray-700 list-disc">
                <li>Memproses dan mengelola pesanan Anda.</li>
                <li>Menyediakan layanan pelanggan dan dukungan teknis.</li>
                <li>Meningkatkan pengalaman pengguna di situs kami.</li>
                <li>Mengirimkan pembaruan terkait pesanan dan informasi penting lainnya.</li>
            </ul>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">3. Perlindungan Data</h2>
            <p class="mb-4 text-gray-800">
                Kami menggunakan langkah-langkah keamanan yang sesuai untuk melindungi informasi pribadi Anda. Data Anda
                disimpan dengan aman di server yang terlindungi dan hanya dapat diakses oleh pihak yang berwenang.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">4. Berbagi Informasi</h2>
            <p class="mb-4 text-gray-800">
                Kami tidak akan menjual atau menyewakan informasi pribadi Anda kepada pihak ketiga. Informasi hanya
                dibagikan dengan mitra terpercaya yang membantu kami dalam menyediakan layanan, seperti pengolahan
                pembayaran.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">5. Cookie dan Teknologi Serupa</h2>
            <p class="mb-4 text-gray-800">
                Kami menggunakan cookie dan teknologi serupa untuk mengumpulkan informasi tentang penggunaan situs dan
                membantu meningkatkan pengalaman Anda. Anda dapat mengatur browser Anda untuk menolak cookie, tetapi
                beberapa fitur situs mungkin tidak berfungsi dengan baik.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">6. Perubahan Kebijakan Privasi</h2>
            <p class="mb-4 text-gray-800">
                Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Setiap perubahan akan diumumkan di situs
                kami, dan versi terbaru akan berlaku segera setelah dipublikasikan.
            </p>
            <h2 class="mt-6 mb-4 text-2xl font-semibold">7. Kontak</h2>
            <p class="mb-4 text-gray-800">
                Jika Anda memiliki pertanyaan atau kekhawatiran tentang kebijakan privasi ini, silakan hubungi kami di:
            </p>
            <p class="text-gray-800">
                Email: <a href="mailto:support@takoyakibabon.com"
                    class="text-blue-500 hover:underline">support@takoyakibabon.com</a>
            </p>
        </div>
    </div>
@endsection
