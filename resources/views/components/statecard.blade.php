@props([
    'title',
    'value',
    'label' => '',
    'bg' => 'bg-white',
    'border' => 'border-green-200',
    'iconBg' => 'bg-gray-100',
])

<div {{ $attributes->class(['flex-1 justify-between flex flex-col w-full grow', $bg, $border, 'border-t-8 rounded-xl p-7 font-monsterrat shadow-xl font-bold'])
    }}>
    <div class="flex justify-between gap-10 items-center mb-4.5">
        <h2 class="text-base font-bold text-subtext">
            {{ $title }}
        </h2>
        <div class="{{ $iconBg }} p-2 rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <div class="flex gap-2">
        <span class="text-4xl leading-none font-bold text-judul">
            {{ $value }}
        </span>

        @if($label)
            <span class="text-base font-semibold text-dark-grey flex items-end">
                {{ $label }}
            </span>
        @endif
    </div>
</div>