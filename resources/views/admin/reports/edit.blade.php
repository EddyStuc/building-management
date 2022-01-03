<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Edit report')  }}
            </h2>
            <x-a-link-button :href="route('admin.reports')">
                <x-icon name="left-arrow" />
                Back to admin reports
            </x-a-link-button>

            <x-a-link-button :href="route('admin.reports.create')">
                Create new report
            </x-a-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-form.layout action="/admin/reports/{{ $report->slug }}" method="PATCH">

                        <x-form.input name="title" :value="old('title', $report->title)" />
                        <x-form.input name="slug" :value="old('slug', $report->slug)" />
                        <x-form.input name="subject" :value="old('subject', $report->subject)" />
                        <x-form.textarea name="body">{{ old('body', $report->body) }}</x-form.textarea>

                        <x-button>Update</x-button>

                    </x-form.layout>

                    <x-form.layout action="/admin/reports/{{ $report->slug }}" method="DELETE">

                        <x-button>
                            <x-icon name="delete" />
                        </x-button>

                    </x-form.layout>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
