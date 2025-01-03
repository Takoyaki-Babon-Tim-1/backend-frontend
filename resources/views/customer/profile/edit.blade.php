@extends('front.layouts.app')
@section('content')
    <div class="px-5 my-[30px] flex flex-col items-center w-full min-h-screen  ">
        <!-- Back Button and Title -->
        <div class="flex items-center justify-between w-full px-3 mb-8">
            <a href="/my-profile">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-[#EBF400] ">
                    <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="object-contain w-5 h-5" alt="icon">
                </div>
            </a>
            <h1 class="text-lg font-bold">Ubah Profil</h1>
            <span class="w-10"></span>
        </div>

        <!-- Form -->
        <form action="{{ route('customer.update') }}" method="POST" enctype="multipart/form-data" class="w-full px-4 mt-8">
            @csrf
            <!-- Profile Image -->
            <div class="relative flex justify-center mb-6">
                <img id="profile-pic-preview" src="{{ Storage::url(Auth::user()->avatar) }}" alt="Profile Picture"
                    class="object-cover w-24 h-24 rounded-full">
                <label for="profile-pic-upload"
                    class="absolute bottom-0 flex items-center justify-center ml-16 bg-blue-500 rounded-full cursor-pointer w-7 h-7">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAe0lEQVR4nO3QOwqAMBBF0fGzG12O4FIsk9J9WLlGiyuBBPzERmfAIrcJIXAeRKQkIoAHZks8pTsC9MDGOa+FV/Ec1UeACViBNt6Hy4j7iqdyI59wx70FaOJ7p40fR2qtb8k1/xb3Bf/dt7jXeByww0OmeMgUD5niJXloB4XGGRY1SJAvAAAAAElFTkSuQmCC">
                </label>
                <input id="profile-pic-upload" type="file" name="avatar" class="hidden"
                    onchange="previewImage(event)" />
            </div>

            <!-- Full Name -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-800">Nama Lengkap</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}"
                    class="w-full p-1 border-b-2 border-gray-200 outline-none focus:border-black placeholder:text-sm"
                    placeholder="Nama Lengkap">
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label class="block mb-1 font-semibold text-gray-800">Email</label>
                <input type="email" name="email" value="{{ Auth::user()->email }}"
                    class="w-full p-1 border-b-2 border-gray-200 outline-none focus:border-black placeholder:text-sm"
                    placeholder="Masukkan email Anda">
            </div>

            <!-- Save Button for Basic Info -->
            <button type="submit" class="w-full bg-[#EBF400] text-black font-semibold py-2 rounded-full ">
                Simpan
            </button>
        </form>

        <!-- Password Update Section -->
        <form action="/update-password" method="POST" class="w-full px-4 mt-6">
            @csrf
            <!-- Old Password -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-800">Password Lama</label>
                <input type="password" name="old_password"
                    class="w-full p-1 border-b-2 border-gray-200 outline-none focus:border-black placeholder:text-sm"
                    placeholder="Password Lama">
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-800">Kata Sandi Baru</label>
                <p class="text-sm font-light ">Pastikan kata sandi Anda antara 8-16 karakter, dengan kombinasi
                    huruf, angka,
                    dan simbol agar lebih aman!
                </p>
                <input type="password" name="new_password"
                    class="w-full p-1 border-b-2 border-gray-200 outline-none focus:border-black placeholder:text-sm"
                    placeholder="Kata sandi baru Anda">
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label class="block mb-1 font-semibold text-gray-800">Konfirmasi Password</label>
                <input type="password" name="new_password_confirmation"
                    class="w-full p-1 border-b-2 border-gray-200 outline-none focus:border-black placeholder:text-sm"
                    placeholder="Konfirmasi kata sandi Anda">
            </div>

            <!-- Save Button for Password -->
            <button type="submit" class="w-full bg-[#EBF400] text-black font-semibold py-2 rounded-full  ">
                Simpan
            </button>
        </form>
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

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profile-pic-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
