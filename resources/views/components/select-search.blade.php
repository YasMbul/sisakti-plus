@props([
    'name',
    'label' => '',
    'options' => [],
    'selected' => null,
    'placeholder' => 'Pilih...',
])

@php
    $optionsArray = collect($options)->values()->all();
    $selectedLabel = collect($optionsArray)->firstWhere('id', $selected)['label'] ?? '';
@endphp

<div
    class="flex flex-col gap-1.5"
    x-data="{
        open: false,
        search: '',
        selectedLabel: @entangle($name).live ? @js($selectedLabel) : '',
        options: @js($optionsArray),
        get filtered() {
            if (this.search === '') return this.options;
            return this.options.filter(o => o.label.toLowerCase().includes(this.search.toLowerCase()));
        },
        select(option) {
            $wire.set('{{ $name }}', option.id);
            this.selectedLabel = option.label;
            this.search = '';
            this.open = false;
        }
    }"
    @click.outside="open = false"
    class="relative"
>
    @if($label)
        <label for="{{ $name }}" class="text-stone-600 text-[11px] font-bold tracking-wide uppercase">
            {{ $label }}
        </label>
    @endif

    {{-- Hidden input untuk validasi Livewire tetap jalan --}}
    <input type="hidden" wire:model="{{ $name }}">

    {{-- Trigger / display box --}}
    <button
        type="button"
        @click="open = !open"
        class="w-full px-4 py-2.5 bg-white text-stone-900 text-sm rounded-lg border text-left @error($name) border-red-500 focus:ring-red-500 @else border-stone-300 focus:ring-teal-700 @enderror focus:outline-none focus:ring-2 transition duration-150 flex justify-between items-center"
    >
        <span x-text="selectedLabel || '{{ $placeholder }}'" :class="selectedLabel ? 'text-stone-900' : 'text-stone-400'"></span>
        <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    {{-- Dropdown panel --}}
    <div
        x-show="open"
        x-transition
        class="z-50 mt-1 w-full bg-white border border-stone-200 rounded-lg shadow-lg max-h-64 overflow-hidden flex flex-col"
        style="display: none;"
    >
        {{-- Search box --}}
        <div class="p-2 border-b border-stone-100">
            <input
                type="text"
                x-model="search"
                x-ref="searchInput"
                placeholder="Cari {{ Str::lower($label) ?: 'opsi' }}..."
                class="w-full px-3 py-1.5 text-sm border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-teal-700"
                @click.stop
            >
        </div>

        {{-- Options list --}}
        <ul class="overflow-y-auto">
            <template x-for="option in filtered" :key="option.id">
                <li
                    @click="select(option)"
                    class="px-4 py-2 text-sm text-stone-700 hover:bg-teal-50 cursor-pointer"
                    x-text="option.label"
                ></li>
            </template>
            <li x-show="filtered.length === 0" class="px-4 py-2 text-sm text-stone-400">
                Tidak ada hasil
            </li>
        </ul>
    </div>

    @error($name) <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
</div>