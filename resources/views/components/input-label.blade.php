@props(['value','require'])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}>
    {{ $value ?? $slot }} @if (isset($require) && $require) <span class='ml-1 text-red-500'>*</span> @endif
</label>