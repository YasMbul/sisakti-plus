@props([
    'title',
    'value',
    'label' => '',
    'bg' => 'bg-white',
    'theme' => 'green', 
])

@php
    $themeMap = [
        'green' => ['border' => 'border-status-green', 'text' => 'text-status-green'],
        'blue'  => ['border' => 'border-status-blue',  'text' => 'text-status-blue'],
        'red'   => ['border' => 'border-status-red',   'text' => 'text-status-red'],
        'yellow' => ['border' => 'border-status-yellow',   'text' => 'text-status-yellow'],
    ];

    // Ambil warna berdasarkan theme, jika tidak ada pasang fallback ke green
    $activeTheme = $themeMap[$theme] ?? $themeMap['green'];
@endphp

<div {{ $attributes->class(['flex-1 justify-between flex flex-col w-full grow', $bg, $activeTheme['border'], 'border-t-8 rounded-xl p-7 font-monsterrat shadow-xl font-bold']) }}>
    <div class="flex justify-between gap-10 items-center mb-4.5">
        <h2 class="text-base font-medium text-subtext-light-grey">
            {{ $title }}
        </h2>
    </div>

    <div class="text-3xl leading-none font-bold text-black">
        {{ $value }}
    </div>
    
    @if($label)
        <span class="text-base font-medium {{ $activeTheme['text'] }}">
            {{ $label }}
        </span>
    @endif
</div>