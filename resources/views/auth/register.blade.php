@extends('front.layouts.app')
@section('content')
    @guest
        <div class="w-full max-w-[500px] p-8 mx-auto">
            <div class="flex items-center justify-between mb-8 mt-[-10px]">
                <a href="/">
                    <div
                        class="flex items-center justify-center w-8 h-8 rounded-full bg-[#EBF400] transition-all duration-300 hover:shadow-[0_10px_20px_0_#EBF400cc]">
                        <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="object-contain w-5 h-5" alt="icon">
                    </div>
                </a>
                <a href="{{ route('faq') }}">
                    <div
                        class="flex items-center justify-center w-8 h-8 rounded-full bg-[#EBF400] transition-all duration-300 hover:shadow-[0_10px_20px_0_#EBF400cc]">
                        <img src="{{ asset('assets/images/icons/question.png') }}" class="object-contain w-4 h-4" alt="icon">
                    </div>
                </a>
            </div>

            <h2 class="text-lg font-semibold text-gray-900">Baru di Takoyaki Babon?</h2>
            <p class="mb-6 text-gray-700">
                Daftar sekarang dan jadilah bagian dari kami untuk menikmati kelezatan takoyaki yang lebih dari sekadar gigitan!
            </p>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block my-4 text-sm font-medium text-gray-700">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input id="name" class="w-full p-2 px-4 mt-1 bg-[#EDEDED] rounded-[30px]" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block my-4 text-sm font-medium text-gray-700">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input id="email" class="w-full p-2 px-4 mt-1 bg-[#EDEDED] rounded-[30px]" type="email" name="email"
                        :value="old('email')" required autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Avatar Upload -->
                {{-- <div class="mb-4">
                    <label for="avatar" class="block text-sm font-medium text-gray-700">
                        Unggah Foto <span class="text-red-500">*</span>
                    </label>
                    <input id="avatar" class="w-full p-2 px-4 mt-1 bg-[#EDEDED] rounded-[30px]" type="file" name="avatar"
                        accept="image/*">
                    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                </div> --}}

                <!-- Password -->
                <div>
                    <label for="password" class="block my-4 text-sm font-medium text-gray-700">
                        Kata Sandi <span class="text-red-500">*</span>
                    </label>
                    <input id="password" class="w-full p-2 px-4 mt-1 bg-[#EDEDED] rounded-[30px]" type="password"
                        name="password" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block my-4 text-sm font-medium text-gray-700">
                        Konfirmasi Kata Sandi <span class="text-red-500">*</span>
                    </label>
                    <input id="password_confirmation" class="w-full p-2 px-4 mt-1 bg-[#EDEDED] rounded-[30px]" type="password"
                        name="password_confirmation" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>


                <div class="my-8">
                    <button type="submit"
                        class="w-full p-3 text-sm font-semibold text-black bg-[#EBF400] rounded-[30px] hover:bg-[#EBF400cc]">
                        Lanjutkan
                    </button>
                </div>
            </form>

            <div class="flex items-center justify-center ">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                    href="{{ route('login') }}">
                    {{ __('Sudah daftar? Masuk di sini!') }}
                </a>
            </div>
        </div>
    @endguest
@endsection
