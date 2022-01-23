<x-app-layout>
    <x-slot name="header">
        <x-page-header-container>
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Edit noticeboard post')  }}
            </h2>
            <div class="flex justify-between space-x-2">
                <x-a-link-button :href="route('admin.noticeboard')">
                    <x-icon name="left-arrow" />
                    Back to admin noticeboard
                </x-a-link-button>
                <x-a-link-button :href="route('admin.noticeboard.create')">
                    Create new post
                </x-a-link-button>
            </div>
        </x-page-header-container>
    </x-slot>

    <x-page-content-container>
        <x-form.layout action="{{ route('admin.noticeboard.update', $noticeboardPost->slug) }}" method="PATCH">

            <x-form.input name="title" :value="old('title', $noticeboardPost->title)" />
            <x-form.input name="slug" :value="old('slug', $noticeboardPost->slug)" />
            <x-form.input name="subject" :value="old('subject', $noticeboardPost->subject)" />
            <x-form.textarea name="body">{{ old('body', $noticeboardPost->body) }}</x-form.textarea>

            <x-button>Update</x-button>

        </x-form.layout>

        <x-form.layout action="{{ route('admin.noticeboard.delete', $noticeboardPost->slug) }}" method="DELETE">

            <x-button>
                <x-icon name="delete" />
            </x-button>

        </x-form.layout>
    </x-page-content-container>
</x-app-layout>
