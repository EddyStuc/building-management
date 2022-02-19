@props(['heading', 'routeTitle'])

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-lg text-gray-800">
                Create new {{ $heading }}
            </h2>
            <x-a-link-button :href="route($routeTitle)">
                <x-icon name="left-arrow"/>
                    Back to {{ str_replace('.', ' ', $routeTitle) }}
            </x-a-link-button>
        </div>
    </x-slot>

    <x-page-content-container>
        <x-form.layout action="{{ route($routeTitle)}}">

            <x-form.input name="title" />
            <x-form.input name="subject"  />
            <x-form.textarea name="body" />


            <x-button>Publish</x-button>
        </x-form.layout>
    </x-page-content-container>
</x-app-layout>
