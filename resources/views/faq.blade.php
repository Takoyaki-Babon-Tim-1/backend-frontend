@extends('front.layouts.app')
@section('content')
    <div class=" px-5 my-[30px] ">
        <div class="flex items-center justify-between w-full px-3 mb-8">
            <a href="/my-profile">
                <div
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-[#EBF400] transition-all duration-300 ">
                    <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="object-contain w-5 h-5" alt="icon">
                </div>
            </a>
            <h1 class="text-2xl font-bold">FAQ</h1>
            <span class="max-w-none"></span>
        </div>
        <div id="accordion-collapse" data-accordion="collapse" class="px-3 text-justify">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-800 border border-b-0 border-gray-700 rtl:text-right rounded-t-xl   hover:bg-[#EBF400]"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                    aria-controls="accordion-collapse-body-1">
                    <span class="text-left">Apa itu Takoyaki Babon?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-b-0 border-gray-700 ">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Takoyaki Babon adalah aplikasi website yang memudahkan
                        pengguna untuk memesan makanan dan minuman secara online, khususnya menu takoyaki spesial dan
                        hidangan lainnya.</p>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-800 border border-b-0 border-gray-700 rtl:text-right    hover:bg-[#EBF400]"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span class="text-left">Bagaimana cara memesan di Takoyaki Babon?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Anda dapat memesan di Takoyaki Babon melalui situs web
                        kami atau aplikasi mobile kami. Pilih menu yang diinginkan, tambahkan ke keranjang, dan ikuti
                        langkah-langkah untuk penyelesaian pembayaran.</p>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-800 border  border-gray-700 rtl:text-right  border-b-0 hover:bg-[#EBF400]"
                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span class="text-left">Apakah ada biaya pengiriman?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Karena Takoyaki Babon hanya menyediakan layanan
                        pemesanan, tidak ada biaya pengiriman. Pelanggan diharapkan untuk mengambil pesanan langsung di
                        lokasi kami.</p>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-4">
                <button type="button"
                    class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-800 border  border-gray-700 rtl:text-right   border-b-0  hover:bg-[#EBF400]"
                    data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                    aria-controls="accordion-collapse-body-4">
                    <span class="text-left">Apakah Takoyaki Babon layanan antar?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Tidak, Takoyaki Babon hanya menyediakan layanan
                        pemesanan dan tidak memiliki layanan antar. Anda perlu datang langsung untuk mengambil pesanan.</p>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-5">
                <button type="button"
                    class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-800 border  border-gray-700 rtl:text-right   hover:bg-[#EBF400]"
                    data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                    aria-controls="accordion-collapse-body-5">
                    <span class="text-left">Apakah bisa membatalkan pesanan? </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Pembatalan pesanan dapat dilakukan sebelum pesanan
                        diproses. Hubungi layanan pelanggan kami segera untuk memproses pembatalan.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all accordion buttons
        const accordionButtons = document.querySelectorAll('[data-accordion-target]');
        accordionButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = button.getAttribute('data-accordion-target');
                const targetPanel = document.querySelector(targetId);
                const isExpanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', !isExpanded);
                targetPanel.classList.toggle('hidden');
                targetPanel.classList.toggle('block');
            });
        });
    });
</script>
