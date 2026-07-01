<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'SISAKTI+') - {{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="/favicon.ico" sizes="any" />
        <link rel="icon" href="/favicon.svg" type="image/svg+xml" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900">
        <div class="min-h-screen md:flex">
            <aside class="hidden md:flex md:w-[228px] flex-col bg-[#102A1F] text-white border-r border-white/10">
                @include('layouts.user-layout')
            </aside>

            <div class="flex-1 min-h-screen flex flex-col">
                <header class="bg-white/80 border-b border-slate-200 px-4 py-4 shadow-sm md:px-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Selamat datang di</p>
                            <h1 class="text-2xl font-semibold text-slate-900">@yield('page-heading', 'Dashboard')</h1>
                        </div>
                        <div class="flex items-center gap-3">
                            <button>
                                <x-icons.notifications class="h-5 w-5 text-slate-700" />
                            </button>
                            <button class="inline-flex items-center justify-center gap-2 rounded-md bg-[#1B4D3E] px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-[#154233]">
                                <x-icons.arrow_up class="h-4 w-4" />
                                Upload Sertifikat
                            </button>
                        </div>
                    </div>
                </header>

                <main class="flex-1 px-4 py-6 md:px-6 md:py-6 md:ml-[26px]">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
