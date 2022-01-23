<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between align-middle md:items-center">
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
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($noticeboardPosts->count())
                        <x-noticeboardPosts-grid :noticeboardPosts="$noticeboardPosts" />

                        {{ $noticeboardPosts->links() }}

                    @else
                        <p class="text-center">No noticeboard posts yet. Please check back later</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
