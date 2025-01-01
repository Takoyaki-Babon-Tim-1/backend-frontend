@extends('front.layouts.app')

@section('content')
    <div class="p-4 bg-white rounded-lg ">
        {{-- HEADING --}}
        <div class="pb-8">
            <h1 class="text-2xl font-semibold">Riwayat</h1>
        </div>
        <div class="flex flex-row pb-3 gap-x-10">
            <div>
                <a href="{{ route('payment.history', ['status' => 'semua']) }}"
                    class="text-lg font-medium {{ request('status') === 'semua' || !request('status') ? 'font-bold underline decoration-2 underline-offset-2' : 'text-gray-400' }}">
                    Semua
                </a>
            </div>
            <div>
                <a href="{{ route('payment.history', ['status' => 'selesai']) }}"
                    class="text-lg font-medium {{ request('status') === 'selesai' ? 'font-bold underline decoration-2 underline-offset-2' : 'text-gray-400' }}">
                    Selesai
                </a>
            </div>
            <div>
                <a href="{{ route('payment.history', ['status' => 'dibatalkan']) }}"
                    class="text-lg font-medium {{ request('status') === 'dibatalkan' ? 'font-bold underline decoration-2 underline-offset-2' : 'text-gray-400' }}">
                    Dibatalkan
                </a>
            </div>
        </div>
        {{-- Cek jika tidak ada order --}}
        @if (isset($noOrdersMessage))
            <div class="py-4 text-center text-gray-600">
                <p>{{ $noOrdersMessage }}</p>
            </div>
        @else
            @foreach ($groupedOrders as $dateKey => $orders)
                <div class="mb-4 bg-white rounded-xl">
                    <p class="font-bold">{{ $orders->first()->order_id }}</p>
                    <hr class="text-gray-200">
                    <div id="order-content-{{ $dateKey }}"
                        class="flex flex-col gap-y-3 overflow-hidden m-0 max-h-[120px] transition-all duration-300">
                        @foreach ($orders as $order)
                            @foreach ($order->products as $product)
                                <div class="flex flex-row justify-between pt-2">
                                    <div class="flex flex-row ">
                                        <div class="w-1/4 max-w-[90px] mr-2">
                                            <img src="{{ Storage::url($product->thumbnail) }}" alt="image-order"
                                                class="object-contain w-full h-auto rounded-xl">
                                        </div>
                                        <div class="flex flex-col w-3/4">
                                            <p
                                                class="mr-4 font-bold truncate md:overflow-visible md:whitespace-normal md:break-words">
                                                {{ $product->name }}</p>
                                            <p>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y H:i') }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="bg-[#E6F2F2] text-[#27AE60] flex items-center justify-center py-1 px-3 rounded-sm">
                                            {{ $order->status }}</div>
                                        <div class="flex items-end pt-10">Rp
                                            {{ number_format($order->total_price, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    {{-- Display the expand button only if the order contains more than 1 product --}}
                    @if ($orders->first()->products->count() > 1)
                        <div class="flex flex-col items-center justify-center w-full pt-2">
                            <button class="toggle-button" data-group="{{ $dateKey }}"
                                class="flex flex-col items-center pb-2 text-sm font-normal ">
                                <div>
                                    <div class="button-text">Lihat Semua</div>
                                </div>
                                <div class="flex items-center justify-center">
                                    <div> <img class="toggle-icon" src="{{ asset('assets/images/icons/down.svg') }}"
                                            alt="down-arrow" class="transition-transform"></div>
                                </div>
                            </button>
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
            @endforeach
        @endif
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
        document.querySelectorAll('.toggle-button').forEach(button => {
            button.addEventListener('click', function() {
                const group = this.dataset.group;
                const orderContent = document.getElementById(`order-content-${group}`);
                const toggleIcon = this.querySelector('.toggle-icon');
                const buttonText = this.querySelector('.button-text');

                if (orderContent.style.maxHeight === 'none') {
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
