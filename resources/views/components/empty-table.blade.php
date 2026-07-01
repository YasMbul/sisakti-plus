@props([
    'title' => 'Tidak ada data',
    'message' => 'Tidak ada data yang tersedia untuk ditampilkan.',
])

<div {{ $attributes->merge(['class' => 'flex w-full flex-col items-center justify-center px-4 py-16 text-center']) }}>
    
    <div class="mb-4 rounded-full bg-slate-50 p-4">
        @if(isset($icon))
                {{ $icon }}
        @else
        <x-icons.file class="fill-subtext-light-grey size-10!" />
        @endif
    </div>

    <h3 class="mb-1 text-base font-bold text-slate-700">
        {{ $title }}
    </h3>

    <p class="mb-6 max-w-sm text-sm text-slate-500">{{ $message }}</p>

</div>