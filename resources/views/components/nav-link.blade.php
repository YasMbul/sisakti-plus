@props (['icon' => '', 'iconClass' => '', 'isActive' => false])

@if ($attributes->has('href'))
   <a
      wire:navigate
      {{
         $attributes->class([
            'font-medium rounded-lg cursor-pointer flex gap-2 items-center w-full h-full py-1.5 px-2',
            'bg-white/25 text-white' => $isActive,
            'text-white/72' => !$isActive,
         ])
      }}
   >
      @if ($icon)
         <x-dynamic-component :component="'icons.' . $icon" :class="$iconClass" />
      @endif
      {{ $slot }}
   </a>
@else
   <button
      {{
         $attributes->class([
            'font-medium rounded-lg cursor-pointer flex gap-2 items-center w-full h-full py-1.5 px-2',
            'bg-white/25 text-white' => $isActive,
            'text-white/72' => !$isActive,
         ])
      }}
   >
      @if ($icon)
         <x-dynamic-component :component="'icons.' . $icon" :class="$iconClass" />
      @endif
      {{ $slot }}
   </button>
@endif
