@extends('front.layouts.app')
@section('title', 'History')
@section('content')
    <div class="px-5 mt-[30px] bg-white rounded-lg pb-[100px]">
        {{-- HEADING --}}
        <div class="mb-8">
            <h1 class="text-2xl font-semibold">Riwayat</h1>
        </div>
        <div class="flex flex-row pb-3 gap-x-10">
            {{-- Link Semua --}}
            <a href="{{ route('payment.history') }}"
                class="text-lg font-medium {{ request('status') === null ? 'underline decoration-2 underline-offset-2' : 'text-gray-400' }}">
                Semua
            </a>

            {{-- Link Selesai --}}
            <div>
                <a href="{{ route('payment.history', ['status' => 'success']) }}"
                    class="text-lg font-medium {{ request('status') === 'success' ? 'underline decoration-2 underline-offset-2' : 'text-gray-400' }}">
                    Selesai
                </a>
            </div>

            {{-- Link Dibatalkan --}}
            <div>
                <a href="{{ route('payment.history', ['status' => 'cancel']) }}"
                    class="text-lg font-medium {{ request('status') === 'cancel' ? 'underline decoration-2 underline-offset-2' : 'text-gray-400' }}">
                    Dibatalkan
                </a>
            </div>
        </div>




        {{-- CEK JIKA ADA ORDER --}}
        @forelse($orders as $order)
            <div class="bg-white rounded-xl mb-4">
                <p>ID <span class="font-bold">{{ $order->order_id }}</span></p>
                <hr class="text-gray-200">

                {{-- CEK JUMLAH PRODUK DI DALAM ORDER --}}
                @if ($order->products->count() > 1)
                    <div id="order-content"
                        class="flex flex-col gap-y-3 overflow-hidden max-h-[120px] transition-all duration-300">
                        @foreach ($order->products as $product)
                            <div class="flex flex-row justify-between pt-2">
                                <div class="flex flex-row items-center justify-center gap-x-3">
                                    <div class="w-6/12">
                                        <img src="{{ Storage::url($product->thumbnail) }}" alt="image-order"
                                            class="object-contain w-full max-w-[90px] h-auto rounded-xl">
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="font-bold truncate">{{ $product->name }}</p>
                                        <p>{{ $order->created_at->format('d M Y') }}</p>
                                        <p>x{{ $product->pivot->quantity }}</p>
                                    </div>
                                </div>

                                <div class="flex flex-col items-end">
                                    {{-- Status Order --}}
                                    @if ($order->status == 'success')
                                        <div
                                            class="bg-[#E6F2F2] text-[#27AE60] flex items-center justify-center py-1 px-3 rounded-md">
                                            Sukses
                                        </div>
                                    @elseif ($order->status == 'pending')
                                        <div
                                            class="bg-[#FFF7E6] text-[#E2B93B] flex items-center justify-center py-1 px-3 rounded-md">
                                            Pending
                                        </div>
                                    @elseif (in_array($order->status, ['cancel', 'deny', 'expire']))
                                        <div
                                            class="bg-[#FDE8E8] text-[#FF4C4C] flex items-center justify-center py-1 px-3 rounded-md">
                                            Gagal
                                        </div>
                                    @endif

                                    <div class="flex items-center gap-x-2 pt-10">
                                        @if ($product->pivot->discounted_price < $product->pivot->price)
                                            <div class="text-gray-500 line-through">
                                                Rp {{ number_format($product->pivot->price, 0, ',', '.') }}
                                            </div>
                                        @endif

                                        <div class="text-black font-bold">
                                            Rp {{ number_format($product->pivot->discounted_price, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    {{-- LIHAT SEMUA --}}
                    <div class="flex flex-col items-center justify-center w-full pt-2">
                        <button class="toggle-button flex flex-col items-center pb-2 text-sm font-normal gap-x-1">
                            <div>
                                <div class="button-text">Lihat Semua</div>
                            </div>
                            <div>
                                <img class="toggle-icon transition-transform"
                                    src="{{ asset('assets/images/icons/down.svg') }}" alt="down-arrow">
                            </div>
                        </button>
                    </div>
                @else
                    {{-- JIKA HANYA ADA 1 PRODUK --}}
                    <div class="flex flex-row justify-between pt-2">
                        <div class="flex flex-row items-center justify-center gap-x-3">
                            <div class="w-6/12">
                                <img src="{{ Storage::url($order->products->first()->thumbnail) }}" alt="image-order"
                                    class="object-contain w-full max-w-[90px] h-auto rounded-xl">
                            </div>
                            <div class="flex flex-col">
                                <p class="font-bold truncate">{{ $order->products->first()->name }}</p>
                                <p>{{ $order->created_at->format('d M Y') }}</p>
                                <p>x{{ $order->products->first()->pivot->quantity }}</p>
                            </div>
                        </div>
                        <div>
                            @if ($order->status == 'success')
                                <div
                                    class="bg-[#E6F2F2] text-[#27AE60] flex items-center justify-center py-1 px-3 rounded-md">
                                    Sukses
                                </div>
                            @elseif ($order->status == 'pending')
                                <div
                                    class="bg-[#FFF7E6] text-[#E2B93B] flex items-center justify-center py-1 px-3 rounded-md">
                                    Pending
                                </div>
                            @elseif (in_array($order->status, ['cancel', 'deny', 'expire']))
                                <div
                                    class="bg-[#FDE8E8] text-[#FF4C4C] flex items-center justify-center py-1 px-3 rounded-md">
                                    Gagal
                                </div>
                            @endif
                            <div class="flex items-end pt-10 gap-x-2">
                                @if ($order->products->first()->pivot->discounted_price < $order->products->first()->pivot->price)
                                    <div class="text-gray-500 line-through">
                                        Rp {{ number_format($order->products->first()->pivot->price, 0, ',', '.') }}
                                    </div>
                                @endif

                                <div class="text-black font-bold">
                                    Rp {{ number_format($order->products->first()->pivot->discounted_price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="flex flex-row justify-between pt-2">
                    <div></div>
                    <div>
                        <p>Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                        <div class="pt-2 place-self-end">
                            <button class="px-3 py-1 bg-[#EBF400] rounded-xl font-semibold">Pesan lagi</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 py-10">
                <p class="text-lg font-medium">Tidak ada riwayat pembayaran.</p>
            </div>
        @endforelse
    </div>
    </div>


    {{-- Bottom Navigation --}}
    <div id="BottomNav"
        class="fixed z-50 bottom-0 w-full max-w-[640px] lg:max-w-[1024px] left-1/2 transform -translate-x-1/2 border-t border-[#E7E7E7] py-4 px-5 bg-white/70 backdrop-blur rounded-t-2xl">
        <div class="flex items-center justify-evenly">
            <a href="{{ route('front.index') }}" class="nav-items">
                <div class="flex flex-col items-center text-center gap-[7px] text-sm leading-[21px] font-semibold">
                    <img src="assets/images/icons/jelajahi-hitam.svg" class="w-6 h-6" alt="icon">
                    <span>Beranda</span>
                </div>
            </a>
            <a href="{{ route('cart.index') }}" class="nav-items">
                <div class="flex flex-col items-center text-center gap-[7px] text-sm leading-[21px]">
                    <img src="assets/images/icons/cart-black.svg" class="w-6 h-6" alt="icon">
                    <span>Keranjang</span>
                </div>
            </a>
            <a href="{{ route('payment.history') }}" class="nav-items">
                <div class="flex flex-col items-center text-center gap-[7px] text-sm leading-[21px]">
                    <img src="assets/images/icons/riwayat-kuning.svg" class="w-6 h-6" alt="icon">
                    <span>Aktivitas</span>
                </div>
            </a>
            <a href="{{ route('customer.profile') }}" class="nav-items">
                <div class="flex flex-col items-center text-center gap-[7px] text-sm leading-[21px]">
                    <img src="assets/images/icons/profil-black.svg" class="w-6 h-6" alt="icon">
                    <span>Profil</span>
                </div>
            </a>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.toggle-button');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const orderContent = this.closest('.bg-white').querySelector('#order-content');
                const toggleIcon = this.querySelector('.toggle-icon');
                const buttonText = this.querySelector('.button-text');

                if (orderContent.style.maxHeight === 'none' || orderContent.style.maxHeight ===
                    '') {
                    orderContent.style.maxHeight = '120px';
                    toggleIcon.style.transform = 'rotate(0deg)';
                    buttonText.innerText = 'Lihat Semua';
                } else {
                    orderContent.style.maxHeight = 'none';
                    toggleIcon.style.transform = 'rotate(180deg)';
                    buttonText.innerText = 'Tutup';
                }
            });
        });
    });
</script>
