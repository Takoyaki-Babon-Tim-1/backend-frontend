<x-guest-layout :title="'Konfirmasi Email'">
    <div class="mb-6 text-sm text-gray-700 bg-[#FFFBEA] p-4 rounded-lg border border-[#EBF400]">
        Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengeklik tautan yang
        telah kami kirimkan ke email Anda. Jika Anda tidak menerima email, kami dengan senang hati akan mengirimkannya
        kembali.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="p-4 mb-6 text-sm font-medium text-green-700 bg-green-100 border border-green-300 rounded-lg">
            Tautan verifikasi baru telah dikirim ke alamat email yang Anda gunakan saat pendaftaran.
        </div>
    @endif

    <div class="flex flex-col items-center justify-between gap-4 mt-6 sm:flex-row">
        <!-- Tombol Kirim Ulang -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button
                class="w-full sm:w-auto px-6 py-2 bg-[#EBF400] text-black font-semibold rounded-lg shadow-md hover:bg-[#D6D200] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#EBF400]">
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full sm:w-auto px-6 py-2 bg-white text-[#EBF400] font-semibold rounded-lg shadow-md border border-[#EBF400] hover:bg-[#FFFBEA] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#EBF400]">
                Keluar
            </button>
        </form>
    </div>
</x-guest-layout>
