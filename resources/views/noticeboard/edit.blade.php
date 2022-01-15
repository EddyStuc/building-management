<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Edit noticeboard post')  }}
            </h2>
            <x-a-link-button :href="route('noticeboard')">
                <x-icon name="left-arrow" />
                Back to noticeboard
            </x-a-link-button>

            <x-a-link-button :href="route('noticeboard.create')">
                Create new post
            </x-a-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-form.layout action="{{ route('noticeboard.update', $noticeboardPost->slug) }}" method="PATCH">

                        <x-form.input name="title" :value="old('title', $noticeboardPost->title)" />
                        <x-form.input name="slug" :value="old('slug', $noticeboardPost->slug)" />
                        <x-form.input name="subject" :value="old('subject', $noticeboardPost->subject)" />
                        <x-form.textarea name="body">{{ old('body', $noticeboardPost->body) }}</x-form.textarea>

                        <x-button>Update</x-button>

                    </x-form.layout>

                    <x-form.layout action="{{ route('noticeboard.delete', $noticeboardPost->slug) }}" method="DELETE">

                        <x-button>
                            <x-icon name="delete" />
                        </x-button>

                    </x-form.layout>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
