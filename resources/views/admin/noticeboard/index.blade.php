<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Admin Noticeboard')  }}
            </h2>
            <x-a-link-button :href="route('admin.noticeboard.create')">
                Create new post
            </x-a-link-button>
        </div>
    </x-slot>

    <div class="py-12 flex">
        <div class="mx-auto px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
                            @if ($noticeboardPosts->count())
                                <div class="mb-4 shadow overflow-hidden border-b border-gray-200 rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-blue-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    Title
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    Subject
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    Created By
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Delete</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ( $noticeboardPosts as $noticeboardPost )
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-semibold text-gray-900 hover:text-blue-400">
                                                        <a href="/admin/noticeboard/{{ $noticeboardPost->slug }}">
                                                            {{ $noticeboardPost->title }}
                                                        </a>
                                                    </div>
                                                </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                    {{ $noticeboardPost->subject }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                    <div>
                                                        <x-dropdown align="right" width="64">
                                                            <x-slot name="trigger">
                                                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                                    <div class="flex">
                                                                        <x-icon name="person" />
                                                                        {{ $noticeboardPost->author->name }}
                                                                    </div>
                                                                </button>
                                                            </x-slot>

                                                            <x-slot name="content">
                                                                <x-dropdown-profile name="Email">
                                                                    {{ $noticeboardPost->author->email }}
                                                                </x-dropdown-profile>
                                                                <x-dropdown-profile name="Building">
                                                                   {{ ucwords($noticeboardPost->author->building->name) }}
                                                                </x-dropdown-profile>
                                                            </x-slot>
                                                        </x-dropdown>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="/admin/noticeboard/{{ $noticeboardPost->slug}}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <x-form.layout action="/admin/noticeboard/{{ $noticeboardPost->slug }}" method="DELETE">

                                                        <button class="text-xs text-red-400">
                                                            <x-icon name="delete" />
                                                        </button>

                                                    </x-form.layout>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{ $noticeboardPosts->links() }}

                            @else
                                <p class="text-center">No posts yet. Please check back later</p>
                            @endif
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
