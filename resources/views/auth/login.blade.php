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

            <h2 class="my-8 text-lg font-semibold text-gray-900">Selamat datang kembali di Takoyaki Babon! <br /> Masuk untuk
                melanjutkan pesanan dan nikmati kelezatan takoyaki favoritmu.</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block my-4 text-sm font-medium text-gray-700">Email</label>
                    <input id="email" class="w-full p-2 px-4 mt-1 bg-[#F4F4F4] rounded-[30px]" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block my-4 text-sm font-medium text-gray-700">Kata Sandi</label>
                    <input id="password" class="w-full p-2 px-4 mt-1 bg-[#F4F4F4] rounded-[30px]" type="password"
                        name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center my-4">
                    <label for="remember_me" class="inline-flex items-center text-sm text-gray-600">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-[#EBF400] shadow-sm focus:ring-[#EBF400]" name="remember">
                        <span class="ml-2">Ingatin saya, ya!</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full p-3 text-sm font-semibold text-black bg-[#EBF400] rounded-[30px] hover:bg-[#EBF400cc]">
                        Login yuk!
                    </button>
                </div>

                <!-- Forgot Password Link -->
                <div class="flex items-center justify-center my-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                            href="{{ route('password.request') }}">
                            {{ __('Lupa kata sandimu?') }}
                        </a>
                    @endif
                </div>
                <div class="flex items-center justify-center ">
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                        href="{{ route('register') }}">
                        {{ __('Belum punya akun? Yuk, daftar dulu!') }}
                    </a>
                </div>
            </form>
        </div>
    @endguest
@endsection
