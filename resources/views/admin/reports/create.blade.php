<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Create new building report')  }}
            </h2>
            <x-a-link-button :href="route('admin.reports')">
                <x-icon name="left-arrow" />
                Back to admin reports
            </x-a-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-form.layout action="{{ route('admin.reports') }}">

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
