<div>
    <div class="mt-3">
        @forelse ($cartItems as $item)
            <div class="flex flex-col py-4 border-gray-400 md:flex-row">
                <div class="flex-shrink-0">
                    <img src="{{ Storage::url($item->product->thumbnail) }}" alt="Product image"
                        class="object-contain w-32 h-32 rounded-xl">
                </div>
                <div class="w-full mt-4 md:ml-6">
                    <h2 class="text-lg font-bold">{{ $item->product->name }}</h2>
                    <div class="flex items-center mt-4">
                        <span class="mr-2 text-gray-600">Kuantitas:</span>
                        <div class="flex items-center">
                            <button wire:click="decreaseQuantity({{ $item->id }})" class="px-2 py-1 bg-gray-200 rounded-l-lg">-</button>
                            <span class="mx-2 text-gray-600">{{ $item->quantity }}</span>
                            <button wire:click="increaseQuantity({{ $item->id }})" class="px-2 py-1 bg-gray-200 rounded-r-lg">+</button>
                        </div>
                        {{-- Product Price --}}
                        <span class="ml-2 font-bold">Rp {{ number_format($item->product->total * $item->quantity, 0, ',', '.') }}</span>
                        <div class="ml-auto">
                            <button wire:click="removeItem({{ $item->id }})">
                                <img src="/assets/images/icons/hapus.svg" class="w-5 h-5" alt="icons">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada produk yang ditambahkan</p>
        @endforelse
    </div>

    <form action="{{ route('payment.checkout') }}" method="POST">
        @csrf
        <div>
            <label for="message" class="block mt-3 mb-2 text-lg font-semibold text-gray-900">
                Catatan untuk penjual nih 😊
            </label>
            <textarea id="message" name="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
                placeholder="Jangan pakai sayuran ya!"></textarea>
        </div>
        <div class="flex flex-col items-end mt-8">
            <div class="flex items-center justify-between w-full">
                <span class="text-gray-600">Total Harga:</span>
                <span class="text-xl font-bold">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>
            <button type="submit"
                class="px-4 py-2 mt-4 w-full flex justify-center font-semibold text-black bg-[#EBF400] hover:bg-[#EBF400] rounded-full">
                <p>Bayar Sekarang</p>
            </button>
        </div>
    </form>
</div>
