@props ([
   'label' => '',
   'name' => '',
   'classLabel' => '',
   'classInput' => '',
   'borderClass' => 'border-stone-300 focus:border-teal-700',
   'options' => [],
   'valueKey' => 'id',
   'labelKey' => 'name',
   'placeholder' => 'Pilih...',
   'noError' => false,
])

<div
   {{
      $attributes
         ->only('class')
         ->class(['flex flex-col gap-1.5 transition duration-300'])
   }}
>
   @if ($label)
      <label for="{{ $name }}" @class(['font-semibold block', $classLabel])>
         {{ $label }}
      </label>
   @endif

   <select
      id="{{ $name }}"
      name="{{ $name }}"
      {{
         $attributes->except([
            'class',
            'classLabel',
            'classInput',
            'options',
            'valueKey',
            'labelKey',
            'placeholder',
            'label',
            'name',
            'noError',
            'borderClass',
         ])
      }}
      @class([
         'w-full px-4 py-2.5 bg-white text-stone-900 text-sm rounded-lg border focus:outline-none focus:ring-2 transition duration-150',
         $borderClass . ' focus:ring-teal-700' => !$errors->has($name),
         'border-red-500 focus:ring-red-500' => $errors->has($name),
         $classInput,
      ])
   >
      <option value="">{{ $placeholder }}</option>
      @foreach ($options as $option)
         <option value="{{ is_array($option) ? $option[$valueKey] : $option->{$valueKey} }}">
            {{ is_array($option) ? $option[$labelKey] : $option->{$labelKey} }}
         </option>
      @endforeach
   </select>

   @if (!$noError)
      @error($name)
         <span class="text-sm text-red-500">{{ $message }}</span>
      @enderror
   @endif
</div>