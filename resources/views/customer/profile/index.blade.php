@extends('front.layouts.app')
@section('title', Auth::user()->name)
@section('content')
    <div class=" px-5 mt-[30px] rounded-lg bg-white ">
        <!-- Header -->
        <h1 class="mb-4 text-xl font-bold lg:text-2xl">Profil</h1>
        <!-- User Information -->
        <div class="flex flex-row items-center justify-between p-3 space-x-4 space-y-0 pb-9">
            <div class="flex items-center gap-5">
                <div class="cursor-pointer" onclick="openImageModal('{{ Storage::url(Auth::user()->avatar) }}')">
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Profile Picture"
                        class="object-cover w-16 h-16 transition-opacity rounded-full md:w-20 md:h-20 lg:w-24 lg:h-24 hover:opacity-90" />
                </div>
                <div>
                    <h2 class="text-xl font-semibold lg:text-2xl">{{ Auth::user()->name }}</h2>
                    <p class="text-sm font-medium text-gray-600 md:text-base">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div id="imageModal" onclick="closeImageModal()"
                class="fixed inset-0 z-50 flex items-center justify-center transition-opacity duration-300 bg-black bg-opacity-50 opacity-0 cursor-pointer pointer-events-none">
                <img id="zoomedImage" src="" alt="Zoomed Profile Picture"
                    class="max-h-[80vh] max-w-[90vw] object-contain" onclick="event.stopPropagation()" />
            </div>
            <div><a href="{{ route('customer.edit', auth()->user()) }}">
                    <img src="assets/images/icons/mdi_edit.png" alt="icon-edit" class="text-gray-500 hover:text-gray-700">
                </a></div>
        </div>
        <!-- Account Section -->
        <h1 class="mb-4 text-lg font-semibold md:text-xl lg:text-2xl">Akun</h1>
        <div class="w-full space-y-4">
            <!-- Account Options -->
            <a href="{{ route('faq') }}"
                class="flex items-center justify-between p-4 bg-white rounded-lg shadow-sm hover:bg-gray-100">
                <div class="flex items-center space-x-4">
                    <img src="assets/images/icons/faq.svg" class="w-6 h-6 md:w-8 md:h-8" alt="icon">
                    <span class="text-lg font-medium">FAQ</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
            <a href="{{ route('privacy.policy') }}"
                class="flex items-center justify-between p-4 bg-white rounded-lg shadow-sm hover:bg-gray-100">
                <div class="flex items-center space-x-4">
                    <img src="assets/images/icons/privacy.svg" class="w-6 h-6 md:w-8 md:h-8" alt="icon">
                    <span class="text-lg font-medium">Kebijakan Privasi</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
            <a href="{{ route('terms.of.service') }}"
                class="flex items-center justify-between p-4 bg-white rounded-lg shadow-sm hover:bg-gray-100">
                <div class="flex items-center space-x-4">
                    <img src="assets/images/icons/service.svg" class="w-[24px] h-[24px] object-contain" alt="icon">
                    <span class="text-lg font-medium">Kebijakan Layanan</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
            <!-- Logout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <div onclick="confirmLogout()"
                class="flex items-center justify-between p-4 bg-white rounded-lg shadow-sm hover:bg-red-100 cursor-pointer">
                <div class="flex items-center space-x-4">
                    <img src="assets/images/icons/keluar.svg" class="w-6 h-6 md:w-8 md:h-8" alt="icon">
                    <span class="text-lg font-medium text-red-500">Keluar Akun</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>
    </div>
    <!-- Bottom Navigation -->
    <div id="BottomNav"
        class="fixed z-50 bottom-0 w-full max-w-[640px] md:max-w-[768px] lg:max-w-[1024px] left-1/2 transform -translate-x-1/2 border-t border-[#E7E7E7] py-4 px-5 bg-white/70 backdrop-blur rounded-t-2xl">
        <div class="flex items-center justify-evenly">
            <a href="{{ route('front.index') }}" class="nav-items">
                <div class="flex flex-col items-center text-center gap-2 text-sm md:text-base leading-[21px] font-semibold">
                    <img src="assets/images/icons/jelajahi-hitam.svg" class="w-6 h-6" alt="icon">
                    <span>Beranda</span>
                </div>
            </a>
            <a href="{{ route('cart.index') }}" class="nav-items">
                <div class="flex flex-col items-center text-center gap-2 text-sm md:text-base leading-[21px]">
                    <img src="assets/images/icons/cart-black.svg" class="w-6 h-6" alt="icon">
                    <span>Keranjang</span>
                </div>
            </a>
            <a href="{{ route('payment.history') }}" class="nav-items">
                <div class="flex flex-col items-center text-center gap-2 text-sm md:text-base leading-[21px]">
                    <img src="assets/images/icons/riwayat-black.svg" class="w-6 h-6" alt="icon">
                    <span>Aktivitas</span>
                </div>
            </a>
            <a href="" class="nav-items">
                <div class="flex flex-col items-center text-center gap-2 text-sm md:text-base leading-[21px]">
                    <img src="assets/images/icons/profil-kuning.svg" class="w-6 h-6" alt="icon">
                    <span>Profil</span>
                </div>
            </a>
        </div>
    </div>
@endsection

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan keluar dari akun ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
