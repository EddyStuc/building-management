<x-app-layout>
    <x-slot name="header">
        <x-page-header-container>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Noticeboard') }}
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
        <article class="max-w-4xl mx-auto md:grid md:grid-cols-12 gap-x-10">
            <div class="col-span-4 text-center md:pt-14 mb-10">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $noticeboardPost->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center justify-center text-sm mt-4">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            {{ $noticeboardPost->author->name }}
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $noticeboardPost->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    {!! nl2br($noticeboardPost->body) !!}
                </div>
            </div>
        </article>
    </x-page-content-container>
</x-app-layout>
