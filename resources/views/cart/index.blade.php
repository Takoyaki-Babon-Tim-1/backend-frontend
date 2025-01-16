@extends('front.layouts.app')
@section('title', 'Keranjang')
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
        @livewire('cart', ['cartItems' => $cartItems])


        
        

    </div>
@endsection
