<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Noticeboard')  }}
            </h2>
            <x-a-link-button :href="route('noticeboard.create')">
                Create new post
            </x-a-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($noticeboardPosts)
                        <x-noticeboardPosts-grid :noticeboardPosts="$noticeboardPosts" />

                        {{ $noticeboardPosts->links() }}

                    @else
                        <p class="text-center">No posts yet. Please check back later</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
