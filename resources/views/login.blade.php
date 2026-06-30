<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />

   <title>SISAKTI+ - {{ config('app.name', 'Laravel') }}</title>

   <link rel="icon" href="/favicon.ico" sizes="any" />
   <link rel="icon" href="/favicon.svg" type="image/svg+xml" />
   <link rel="apple-touch-icon" href="/apple-touch-icon.png" />

   @vite (['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="m-0 flex min-h-screen items-center justify-center bg-white p-0 font-sans md:p-8">
   <div
      class="flex w-full max-w-4/5 flex-col justify-center gap-8 rounded-2xl bg-white md:flex-row md:gap-12"
   >
      <div class="hidden max-w-sm items-center justify-center md:flex md:w-5/12">
         <img
            src="{{ asset('assets/images/Curious-amico-1.png') }}"
            alt="Ilustrasi login"
            class="h-auto max-w-150 object-contain"
         />
      </div>
      <div
         class="flex w-full flex-col justify-center rounded-2xl border border-[#000000]/40 p-8 md:w-7/12 md:p-12"
      >
         <div class="w-full max-w-md">
            <div class="mb-8 w-full">
               <h1 class="mb-2 text-4xl font-bold text-[#1B4D3E]">LOGIN SISAKTI+</h1>
               <h2 class="mb-2 text-xl font-semibold text-[#000000]">
                  Sistem Pengelolaan SKP Udayana
               </h2>
               <p class="text-sm text-[#2B364A]">Halo! Sobat Unud👋 mau tau SKP-mu udah berapa? Yuk, login dulu sebelum SISAKTI+ tunjukkin ^^</p>
            </div>
         </div>

         <form action="{{ route('login.auth') }}" method="POST" class="flex w-full flex-col gap-4">
            @csrf

            <div>
               <label for="nim" class="mb-2 block text-base font-semibold text-[#000000]">
                  NIM
               </label>
               <div class="relative flex items-center">
                  <svg class="absolute left-4 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                  </svg>
                  <input
                     type="text"
                     id="nim"
                     name="nim"
                     required
                     placeholder="Masukkan NIM Anda..."
                     class="w-full rounded-lg border border-gray-300 py-3 pr-4 pl-12 text-sm font-medium text-[#001524]/60 focus:border-transparent focus:ring-2 focus:ring-[#1B4D3E] focus:outline-none"
                  />
               </div>
            </div>

            <div>
               <label for="password" class="mb-2 block text-base font-semibold text-[#000000]">
                  Password
               </label>
               <div class="relative flex items-center">
                  <svg class="absolute left-4 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                  </svg>
                  <input
                     type="password"
                     id="password"
                     name="password"
                     required
                     placeholder="Masukkan Password Anda..."
                     class="w-full rounded-lg border border-gray-300 py-3 pr-4 pl-12 text-sm font-medium text-[#001524]/60 focus:border-transparent focus:ring-2 focus:ring-[#1B4D3E] focus:outline-none"
                  />
               </div>
            </div>

            <div class="mb-8 flex items-center justify-between">
               <label for="remember-me" class="flex cursor-pointer items-center gap-2">
                  <input
                     type="checkbox"
                     id="remember-me"
                     name="remember-me"
                     class="h-4 w-4 cursor-pointer rounded border-gray-300 text-[#1B4D3E] focus:ring-[#1B4D3E]"
                  />
                  <span class="text-base text-[#888780]">Ingat perangkat ini</span>
               </label>

               <a
                  href="/forgot-password"
                  class="text-base font-bold text-[#1B4D3E] transition-colors duration-300 hover:text-blue-600 hover:underline"
                  >Lupa kata sandi?</a
               >
            </div>
            <button
               type="submit"
               class="w-full rounded-lg bg-[#1B4D3E] py-3 text-xl font-bold text-white transition-colors duration-300 hover:bg-[#153a2d]"
            >
               MASUK
            </button>

            <div class="mt-6 text-center text-base font-normal text-[#888780]">
               <span> Loginmu terkendala? </span>
               <a
                  href="/staff-contact"
                  class="text-base font-bold text-[#1B4D3E] transition-colors duration-300 hover:text-blue-600 hover:underline"
                  >Kontak staf di sini</a
               >
            </div>
         </form>
      </div>
</body>
</html>
