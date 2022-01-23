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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mx-3 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-form.layout action="{{ route($routeTitle)}}">

                        <x-form.input name="title" />
                        <x-form.input name="slug" />
                        <x-form.input name="subject"  />
                        <x-form.textarea name="body" />


                        <x-button>Publish</x-button>
                    </x-form.layout>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>