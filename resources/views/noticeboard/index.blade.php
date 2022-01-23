<x-app-layout>
    <x-slot name="header">
        <x-page-header-container>
            <h2 class="hidden md:inline-block font-semibold text-xl text-gray-800">
                {{ __('Noticeboard')  }}
            </h2>

            <x-form.layout method="GET" action="{{ route('noticeboard') }}">
                <x-form.search />
            </x-form.layout>

            <div class="mt-2 md:mt-0 text-right">
                <x-a-link-button :href="route('noticeboard.create')">
                    Create new post
                </x-a-link-button>
            </div>
        </x-page-header-container>
    </x-slot>

    <x-page-content-container>
        @if ($noticeboardPosts->count())
            <x-noticeboardPosts-grid :noticeboardPosts="$noticeboardPosts" />

            {{ $noticeboardPosts->links() }}

        @else
            <p class="text-center">No noticeboard posts yet. Please check back later</p>
        @endif
    </x-page-content-container>
</x-app-layout>
