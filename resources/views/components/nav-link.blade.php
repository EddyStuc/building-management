@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center text-center px-1 border-b-2 border-indigo-400 text-xs md:text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'flex items-center text-center px-1 border-b-2 border-transparent text-xs md:text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
