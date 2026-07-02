<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>
      SISAKTI+ |
      @if (isset($title))
         {{ $title }}
      @else
         @yield ('title')
      @endif
   </title>
   @vite (['resources\css\app.css', 'resources\js\app.js'])
</head>

@php
   $user = auth()->user();
   $menus = match ($user->role) {
      'mahasiswa' => [
         [
            'title' => 'Panduan SKP',
            'isActive' => request()->routeIs('mahasiswa.panduan'),
            'to' => route('mahasiswa.panduan'),
            'icon' => 'book',
         ],
         [
            'title' => 'Upload Sertifikat',
            'isActive' => request()->routeIs('mahasiswa.upload'),
            'to' => route('mahasiswa.upload'),
            'icon' => 'up-arrow',
         ],
         [
            'title' => 'Daftar Sertifikat',
            'isActive' => request()->routeIs('mahasiswa.daftar'),
            'to' => route('mahasiswa.daftar'),
            'icon' => 'hamburg',
         ],
      ],
      'admin' => [
         [
            'title' => 'Verifikasi SKP',
            'isActive' => request()->routeIs('admin.verifikasi-skp*'),
            'to' => route('admin.verifikasi-skp'),
            'icon' => 'up-arrow',
         ],
         [
            'title' => 'Kelola Akun',
            'isActive' => request()->routeIs('admin.kelola-akun*'),
            'to' => route('admin.kelola-akun'),
            'icon' => 'user',
         ],
         [
            'title' => 'Pengaturan SKP',
            'isActive' => request()->routeIs('admin.pengaturan-skp*'),
            'to' => route('admin.pengaturan-skp'),
            'icon' => 'gear',
         ]
      ],
   };

   $dashboard = match ($user->role) {
      'mahasiswa' => [
         'isActive' => request()->routeIs('home'),
         'to' => route('home'),
      ],
      'admin' => [
         'isActive' => request()->routeIs('admin.home'),
         'to' => route('admin.home'),
      ],
   };
@endphp

<body>
   <div class="font-montserrat min-h-screen">
      <nav class="bg bg-primary fixed top-0 left-0 flex min-h-screen flex-col">
         <div class="flex flex-col items-center border-b border-[#666666] p-8">
            <img src="{{ asset('assets/images/Logo.svg') }}" alt="Logo Sisakti-Plus" />
            <h1 class="font-semibold text-[#C1C1C1]">Universitas Udayana</h1>
            <div
               class="mt-3 flex w-4/5 items-center gap-2.5 rounded-xl bg-white/12 px-2.5 py-1.25 text-xs font-semibold text-white"
            >
               <span class="size-2.25 rounded-full bg-[#7ECBA3]"></span>
               {{
                  $user->role === 'mahasiswa'
                     ? 'Mahasiswa'
                     : 'Admin BEM'
               }}
            </div>
         </div>
         <div class="flex flex-1 flex-col gap-4 px-2.25 py-4">
            <div class="px-1.75">
               <x-nav-link
                  href="{{ $dashboard['to'] }}"
                  icon="dashboard"
                  isActive="{{ $dashboard['isActive'] }}"
                  iconClass="size-4!"
               >
                  Dashboard
               </x-nav-link>
            </div>
            <h1 class="text-xs font-bold tracking-widest text-white/40 uppercase">Sertifikat</h1>
            <div class="flex-1 space-y-4 px-1.75">
               @foreach ($menus as $menu)
                  <x-nav-link
                     href="{{ $menu['to'] }}"
                     icon="{{ $menu['icon'] }}"
                     isActive="{{ $menu['isActive'] }}"
                     iconClass="size-4!"
                     class="{{ $menu['isActive'] ? '' : 'hover:bg-white/15' }}"
                  >
                     {{ $menu['title'] }}
                  </x-nav-link>
               @endforeach
            </div>
         </div>
         <div class="space-y-2.25 border-t border-[#666666] px-4.25 py-4.75">
            <div class="flex w-full gap-3.5">
               <img
                  src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) ?? 'User' }}&background={{ substr(md5(auth()->user()->name ?? 'User'), 0, 6) }}&color=fff"
                  alt="Profile"
                  class="size-10.5 rounded-full object-cover"
               />
               <div class="flex flex-col justify-center">
                  <span class="text-xs font-medium text-white">{{ auth()->user()->name }}</span>
                  <span class="text-[10px] text-white/72">{{ auth()->user()->nim }}</span>
               </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="">
               @csrf
               <x-nav-link
                  type="submit"
                  class="justify-center rounded-xl border border-white/72 bg-black/50"
                  >Keluar</x-nav-link
               >
            </form>
         </div>
      </nav>
      <main class="bg-background ml-58">
         @if (isset($slot))
            {{ $slot }}
         @else
            @yield ('content')
         @endif
      </main>
   </div>
   @livewireScripts
</body>
</html>
