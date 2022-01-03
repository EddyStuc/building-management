@props(['name',
     'labelName',
     'value',
     'contactMessage'])

<div class="flex ml-4">
    <x-form.label name='{{ $labelName }}' class="mr-px"/>
    <input
        class="text-blue-400 focus:ring-0"
        type="radio"
        value="{{ $value }}"
        name="{{ $name }}"
        {{ ($contactMessage->answered == $value) ? 'checked' : '' }}
        {{ $attributes }}
    >
    <x-form.error name="{{ $name }}" />
</div>

