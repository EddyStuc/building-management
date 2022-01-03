@props(['name'])

<div class="p-px">
    <p class="text-gray-700 font-semibold text-sm p-2">
       <span class="text-blue-400">{{ $name }}</span>: {{ $slot }}
    </p>
</div>
