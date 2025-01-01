@extends('front.layouts.app')
<style>
    .star.selected {
        content: url('{{ asset('assets/images/icons/Star 1.svg') }}');
        /* Bintang terisi */
    }

    .star.unselected {
        content: url('{{ asset('assets/images/icons/Star-grey.svg') }}');
        /* Bintang kosong */
    }
</style>
@section('content')
    @php
        $user = auth()->user();
        $hasReviewed = false;

        if ($user) {
            $hasReviewed = $product
                ->reviews()
                ->where('user_id', $user->id)
                ->exists();
        }
        $totalRating = $product->reviews()->avg('rating');
    @endphp
    <nav class="absolute top-0 flex w-full items-center justify-between px-5 mt-[30px] z-20">
        <a href="/">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-[#EBF400] transition-all duration-300 ">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="object-contain w-5 h-5" alt="icon">
            </div>
        </a>
        @auth
            <a href="{{ route('cart.index') }}">
                <div class="relative">
                    <div
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-[#EBF400] transition-all duration-300 ">
                        <img src="https://img.icons8.com/material-outlined/48/shopping-cart--v1.png"
                            class="object-contain w-5 h-5" alt="icon">
                    </div>
                    @if ($cartItemCount > 0)
                        <span
                            class="absolute bottom-0 right-0 flex items-center justify-center w-4 h-4 text-xs font-semibold text-white bg-red-600 rounded-full">
                            {{ $cartItemCount }}
                        </span>
                    @endif

                </div>
            </a>
        @endauth
    </nav>
    <header id="Gallery" class="relative w-full h-[420px] flex shrink-0 rounded-b-[40px] bg-black overflow-hidden">
        <div class="relative flex w-full h-full shrink-0">
            <div
                class="gradient-filter absolute w-full h-full bg-[linear-gradient(180deg,rgba(0,0,0,0)40.47%,#000000_81.6%)] z-10">
            </div>
            <img src="{{ Storage::url($product->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail">
        </div>
        <div class="absolute bottom-0 z-20 flex flex-col w-full gap-5">
            <!-- If we need pagination -->
            <div class="swiper-pagination !-top-5 *:!bg-white"></div>
            <div class="flex justify-between items-baseline p-5 pb-[23px] gap-3">
                <div class="flex flex-col gap-[6px]">
                    {{-- <p class="font-semibold text-[#FF4C1C]">Top Bakery</p> --}}
                    <h1 class="font-bold text-[34px] leading-[46px] text-white">{{ $product->name }}</h1>
                </div>
                <div class="flex items-center px-2 py-1 rounded-full shrink-0 w-fit h-fit bg-white/20 backdrop-blur">
                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-4 h-4" alt="star">
                    <span
                        class="font-semibold text-xs leading-[18px] text-white">{{ number_format($totalRating, 1) }}</span>
                </div>
            </div>
        </div>
    </header>
    <section id="Description" class="flex flex-col px-5 mt-4">
        <div class="flex flex-col my-4">
            <h2 class="text-lg font-bold ">Tentang</h2>
            <p class="leading-8">{{ $product->about }}</p>
        </div>

    </section>
    <section id="Reviews" class="pb-24 ">
        <div class="flex items-center justify-between px-5">
            <h2 class="text-xl font-bold">Ulasan</h2>
        </div>
        <div class="px-5 mt-4">
            @forelse($product->reviews as $review)
                <div class="flex flex-col gap-2 border-b">
                    <div class="flex justify-between">
                        <div>
                            {{-- NAMA USER --}}
                            <p class="mb-1 font-semibold">{{ $review->user->name }}</p>
                            {{-- STAR REVIEW --}}
                            <div class="flex items-center gap-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 h-5"
                                            alt="star">
                                    @else
                                        <img src="{{ asset('assets/images/icons/Star-grey.svg') }}" class="w-5 h-5"
                                            alt="empty star">
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">{{ $review->created_at->format('d M Y') }}</span>
                    </div>
                    <p class="mb-2 leading-6">{{ $review->review }}</p>
                </div>
            @empty
                <p class="text-gray-500">Belum ada review.</p>
            @endforelse
        </div>
        <!-- Review Input Form -->
        @auth
            @if (!$hasReviewed)
                <div class="px-5 mt-6">
                    <h3 class="font-bold">Berikan Review Anda</h3>
                    <form action="{{ route('reviews.store', $product->id) }}" method="POST" class="flex flex-col gap-4 mt-4">
                        @csrf
                        <!-- Star Rating -->
                        <div class="flex items-center gap-2">
                            <label for="rating" class="font-semibold">Rating:</label>
                            <div class="flex" id="star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <input type="radio" id="rating-{{ $i }}" name="rating"
                                        value="{{ $i }}" class="hidden">
                                    <label for="rating-{{ $i }}" class="cursor-pointer">
                                        <!-- Set default star to grey -->
                                        <img src="{{ asset('assets/images/icons/Star-grey.svg') }}"
                                            data-index="{{ $i }}" class="w-6 h-6 star" alt="star">
                                    </label>
                                @endfor
                            </div>
                        </div>
                        <!-- Review Text -->
                        <div>
                            <label for="review" class="font-semibold gap-y-2">Review:</label>
                            <textarea name="review" id="review" rows="4"
                                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-400"
                                placeholder="Tulis review Anda di sini..."></textarea>
                        </div>

                        <button type="submit" class="px-4 py-2 text-white bg-orange-500 rounded-full hover:bg-orange-600">Kirim
                            Review</button>
                    </form>
                </div>
            @else
                <div class="flex justify-center">
                    <p class="px-5 mt-6 text-green-500">Anda sudah memberikan review untuk produk ini.</p>
                </div>
            @endif
        @else
            <div class="flex justify-center">
                <p class="px-5 mt-6 text-orange-500">Anda harus login untuk menulis review.</p>
            </div>
        @endauth
    </section>
    <div id="BottomNav" class="z-50 bottom-0 w-full px-5  border-t border-[#E7E7E7]  bg-white/70 backdrop-blur">
        <div class="flex gap-2 mt-2">
            <div class="flex items-start w-6/12 px-4 py-1 md:w-4/12">
                <p class="text-lg font-semibold ">Rp
                    {{ number_format($product->total, 0, ',', '.') }} <span
                        class="text-sm font-normal text-red-500 line-through ">Rp
                        {{ number_format($product->price, 0, ',', '.') }}</span></p>
            </div>
            <div class="w-6/12 px-4 md:w-8/12">
                <form action="{{ route('cart.add', ['productId' => $product->id, 'from' => 'detail']) }}" method="POST"
                    class="w-full">
                    @csrf
                    <button class="rounded-full w-full font-semibold text-black bg-[#EBF400] py-2 ">
                        Tambahkan
                    </button>
                </form>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
