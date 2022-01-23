<x-app-layout>
    <x-slot name="header">
        <x-page-header-container>
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Edit report')  }}
            </h2>
            <div class="flex justify-between space-x-2">
                <x-a-link-button :href="route('reports')">
                    <x-icon name="left-arrow" />
                    Back to reports
                </x-a-link-button>
                <x-a-link-button :href="route('reports.create')">
                    Create new report
                </x-a-link-button>
            </div>
        </x-page-header-container>
    </x-slot>

    <x-page-content-container>
        <x-form.layout action="{{ route('reports.update', $report->slug) }}" method="PATCH">

            <x-form.input name="title" :value="old('title', $report->title)" />
            <x-form.input name="slug" :value="old('slug', $report->slug)" />
            <x-form.input name="subject" :value="old('subject', $report->subject)" />
            <x-form.textarea name="body">{{ old('body', $report->body) }}</x-form.textarea>

            <x-button>Update</x-button>

        </x-form.layout>

        <x-form.layout action="{{ route('reports.delete', $report->slug) }}" method="DELETE">

            <x-button>
                <x-icon name="delete" />
            </x-button>

        </x-form.layout>
    </x-page-content-container>
</x-app-layout>
