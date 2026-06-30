<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SISAKTI+ - {{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

            @vite(['resources/css/app.css', 'resources/js/app.js'])
       
    </head>
    <body class="bg-white m-0 p-0 font-sans min-h-screen flex items-center justify-center md:p-8">
        <div class="w-full max-w-4xl bg-white rounded-2xl flex flex-col md:flex-row justify-center gap-8 md:gap-12">
            <div class="hidden md:flex md:w-5/12 items-center justify-center max-w-sm">
                    <img src="{{ asset('assets/images/Curious-amico-1.png') }}" alt="Ilustrasi login" class="max-w-150 h-auto object-contain">
            </div>
            <div class="w-full md:w-7/12 flex flex-col justify-center p-8 md:p-12 border border-[#000000]/40 rounded-2xl">
                <div class="w-full max-w-md">
                    <div class="w-full mb-8">
                        <h1 class="text-4xl font-bold text-[#1B4D3E] mb-2">
                            LOGIN SISAKTI+
                        </h1>
                        <h2 class="text-xl font-semibold text-[#000000] mb-2">
                            Sistem Pengelolaan SKP Udayana
                        </h2>
                        <p class="text-sm text-[#2B364A]">
                            Halo! Sobat Unud👋 mau tau SKP-mu udah berapa? Yuk, login dulu sebelum SISAKTI+ tunjukkin ^^
                        </p>
                    </div>
                </div>

                <form action="/login" method="POST" class="w-full flex flex-col gap-4">
                    @csrf

                        <div>
                            <label for="identity" class="block mb-2 text-base font-semibold text-[#000000]">
                                NIM/Email Unud Pengguna
                            </label>
                            <div class="relative flex items-center">
                                <svg class="w-5 h-5 absolute left-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <input type="text" id="identity" name="identity" required placeholder="Masukkan NIM/Email Unud Anda..." class="w-full pl-12 pr-4 py-3 border text-[#001524]/60 font-medium border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-base font-semibold text-[#000000]">
                                Password
                            </label>
                            <div class="relative flex items-center">
                                <svg class="w-5 h-5 absolute left-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <input type="password" id="password" name="password" required placeholder="Masukkan Password Anda..." class="w-full pl-12 pr-4 py-3 text-[#001524]/60 font-medium border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent">
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-8">
                            <label for="remember-me" class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="remember-me" name="remember-me" class="w-4 h-4 text-[#1B4D3E] border-gray-300 rounded focus:ring-[#1B4D3E] cursor-pointer">
                                <span class="text-base text-[#888780]">Ingat perangkat ini</span>
                            </label>

                            <a href="/forgot-password" class="text-base font-bold text-[#1B4D3E] hover:text-blue-600 hover:underline transition-colors duration-300">Lupa kata sandi?</a>
                        </div>
                        <button type="submit" class="w-full py-3 bg-[#1B4D3E] text-xl text-white font-bold rounded-lg hover:bg-[#153a2d] transition-colors duration-300">MASUK</button>

                        <div class="text-center mt-6 text-base font-normal text-[#888780]">
                            <span>
                                Loginmu terkendala?
                            </span>
                            <a href="/staff-contact" class="text-[#1B4D3E] text-base font-bold hover:text-blue-600 hover:underline transition-colors duration-300">Kontak staf di sini</a>
                        </div>

                </form>
            </div>
    </body>
</html>
