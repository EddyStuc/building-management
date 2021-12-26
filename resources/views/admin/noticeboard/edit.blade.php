<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Edit noticeboard post')  }}
            </h2>
            <x-a-link-button :href="route('admin.noticeboard')">
                <x-icon name="left-arrow" />
                Back to admin noticeboard
            </x-a-link-button>

            <x-a-link-button :href="route('admin.noticeboard.create')">
                Create new post
            </x-a-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-form.layout action="/admin/noticeboard/{{ $noticeboardPost->slug }}" method="PATCH">

                        <x-form.input name="title" :value="old('title', $noticeboardPost->title)" />
                        <x-form.input name="slug" :value="old('slug', $noticeboardPost->slug)" />
                        <x-form.input name="subject" :value="old('subject', $noticeboardPost->subject)" />
                        <x-form.textarea name="body">{{ old('body', $noticeboardPost->body) }}</x-form.textarea>

                        <x-button>Publish</x-button>
                    </x-form.layout>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
