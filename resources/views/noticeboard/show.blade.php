<x-app-layout>
    <x-slot name="header">
        <x-page-header-container>
            <h2 class="hidden md:inline-block whitespace-nowrap font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Noticeboard') }}
            </h2>
            <div class="flex space-x-2 w-full justify-between md:justify-end">
                <x-a-link-button :href="route('noticeboard')">
                    <x-icon name="left-arrow" />
                    Back to noticeboard
                </x-a-link-button>
                <x-a-link-button :href="route('noticeboard.create')">
                    Create new post
                </x-a-link-button>
            </div>
        </x-page-header-container>
    </x-slot>

    <x-page-content-container>

        @allowEdit(Auth::user(), $noticeboardPost)
            <div class="flex w-full justify-end">
                <x-a-link-button href="{{ route('noticeboard.edit', $noticeboardPost->slug) }}">
                    Edit your post
                </x-a-link-button>
            </div>
        @endallowEdit

        <article class="max-w-4xl mx-auto md:grid md:grid-cols-12 gap-x-10 mt-4">
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
                <h1 class="font-bold text-4xl mb-10">
                    {{ $noticeboardPost->title }}
                </h1>
                <h3 class="font-bold text-xl mb-10">
                    {{ $noticeboardPost->subject }}
                </h3>

                <div class="space-y-4 text-lg leading-loose">
                    {!! nl2br($noticeboardPost->body) !!}
                </div>
            </div>
        </article>
    </x-page-content-container>
</x-app-layout>
