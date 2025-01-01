@extends('front.layouts.app')
@section('content')
    <div class="container px-5 my-[30px] ">
        <div class="flex items-center justify-between w-full mb-8">
            <a href="/">
                <div
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-[#EBF400] transition-all duration-300">
                    <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="object-contain w-5 h-5" alt="icon">
                </div>
            </a>
            <h1 class="text-2xl font-bold ">Pembelianmu</h1>
            <span class="max-w-none"></span>
        </div>
        <div class="mt-3">
            @forelse ($cartItems as $item)
                <div class="flex flex-col py-4 border-gray-400 md:flex-row">
                    <div class="flex-shrink-0">
                        <img src="{{ Storage::url($item->product->thumbnail) }}" alt="Product image"
                            class="object-contain w-32 h-32 rounded-xl">
                    </div>
                    <div class="w-full mt-4 md:ml-6">
                        <h2 class="text-lg font-bold">{{ $item->product->name }}</h2>
                        {{-- <p class="mt-2 text-gray-600">Product Description</p> --}}
                        <div class="flex items-center mt-4">
                            <span class="mr-2 text-gray-600">Kuantitas:</span>
                            <div class="flex items-center">
                                {{-- Reduce quantity form --}}
                                <form
                                    action="{{ $item->quantity > 1 ? route('cart.update', $item->id) : route('cart.remove', $item->id) }}"
                                    method="POST">
                                    @csrf
                                    @if ($item->quantity > 1)
                                        @method('PATCH')
                                        <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                        <button class="px-2 py-1 bg-gray-200 rounded-l-lg">-</button>
                                    @else
                                        @method('DELETE')
                                        <button class="px-2 py-1 bg-gray-200 rounded-l-lg">-</button>
                                    @endif
                                </form>
                                {{-- Display current quantity --}}
                                <span class="mx-2 text-gray-600">{{ $item->quantity }}</span>
                                {{-- Increase quantity form --}}
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                    <button class="px-2 py-1 bg-gray-200 rounded-r-lg">+</button>
                                </form>
                            </div>
                            @php
                                $total_products = $item->product->total * $item->quantity;
                            @endphp
                            {{-- Product Price --}}
                            <span class="ml-2 font-bold">Rp {{ number_format($total_products, 0, ',', '.') }}</span>
                            <div class="ml-auto">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button><img src="/assets/images/icons/hapus.svg" class="w-5 h-5"
                                            alt="icons"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Tidak ada produk yang ditambahkan</p>
            @endforelse
        </div>

        {{-- CATATAN --}}
        <div>
            <h2 class="mt-3 text-lg font-bold md:text-xl">Bikin Sesuai Gaya Kamu!</h2>
            <div class="gap-y-2">
                <div class="flex flex-row justify-between mt-3">
                    <p class="text-sm font-normal md:text-base">🌱 Tidak Pedas: Tetap nikmat tanpa rasa pedas.</p>
                    <input type="checkbox" class="w-4 h-4 ">
                </div>
                <div class="flex flex-row justify-between mt-3">
                    <p class="text-sm font-normal md:text-base">🌶️ Sedang: Pas, ada sensasi pedasnya.</p>
                    <input type="checkbox" class="w-4 h-4 ">
                </div>
                <div class="flex flex-row justify-between mt-3">
                    <p class="text-sm font-normal md:text-base">🌶️🌶️ Pedas: Pedas mantap, bikin semangat!</p>
                    <input type="checkbox" class="w-4 h-4 ">
                </div>
            </div>
            {{-- TEXTAREA --}}
            <label for="message" class="block mt-3 mb-2 text-lg font-semibold text-gray-900">Catatan untuk penjual nih
                😊</label>
            <textarea id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  "
                placeholder="Jangan pakai sayuran ya!"></textarea>
        </div>
        <div class="flex flex-col items-end mt-8">
            <div class="flex items-center justify-between w-full">
                <span class="text-gray-600">Total Harga:</span>
                <span class="text-xl font-bold">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>
            <a href="{{ route('payment.checkout') }}"
                class="px-4 py-2 mt-4 w-full flex justify-center font-semibold text-black bg-[#EBF400]  hover:bg-[#EBF400] rounded-full ">
                <p>Bayar Sekarang</p>
            </a>
        </div>
    </div>
@endsection
