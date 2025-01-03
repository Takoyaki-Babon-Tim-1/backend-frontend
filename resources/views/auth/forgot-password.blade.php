<x-guest-layout>
    <div class="mb-6 text-sm text-center text-gray-600">
        <p>{{ __('Lupa kata sandi? Tidak masalah! Cukup masukkan alamat email Anda, dan kami akan mengirimkan tautan untuk mereset kata sandi Anda.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Alamat Email')" class="text-lg font-medium text-gray-700" />
            <x-text-input id="email"
                class="block w-full px-4 py-2 mt-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-EBF400"
                type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button
                class="px-6 py-2 font-semibold rounded-lg text-hitam bg-takoyaki-yellow hover:bg-yellow-400 focus:ring-2 focus:ring-yellow-500 focus:bg-takoyaki-yellow">
                {{ __('Kirim Tautan Reset') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Additional Text for User -->
    <div class="mt-6 text-sm text-center text-gray-500">
        <p>{{ __('Ingat kata sandi Anda?') }} <a href="{{ route('login') }}"
                class="font-semibold text-gray-800 underline ">{{ __('Masuk di sini') }}</a></p>
    </div>
</x-guest-layout>
