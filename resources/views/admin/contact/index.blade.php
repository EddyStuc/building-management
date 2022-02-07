<x-app-layout>
    <x-slot name="header">
        <x-page-header-container>
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Contact Messages')  }}
            </h2>
        </x-page-header-container>
    </x-slot>

    <x-page-content-container>
        <div class="flex flex-col">
            <div class="overflow-x-auto lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full px-2 lg:px-8">
                @if ($contactMessages->count())
                    <div class="mb-4 shadow overflow-hidden border-b border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-blue-400">
                                <tr>
                                    <th scope="col" class="px-1 md:px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        Subject
                                    </th>
                                    <th scope="col" class="px-1 md:px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        Created By
                                    </th>
                                    <th scope="col" class="px-1 md:px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        Answered
                                    </th>
                                    <th scope="col" class="relative px-1 md:px-3 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative px-1 md:px-3 py-3">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ( $contactMessages as $contactMessage )
                                @if ($loop->odd)
                                    <tr class="bg-white">
                                @else
                                    <tr class="bg-gray-50">
                                @endif
                                    <td class="px-1 md:px-3 py-3">
                                    <div class="flex items-center">
                                        <div class="text-xs md:text-sm font-semibold text-gray-900 hover:text-blue-400">
                                            <a href="{{ route('admin.contactMessages.show', $contactMessage->slug) }}">
                                                {{ $contactMessage->subject }}
                                            </a>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="px-1 md:px-3 py-3 text-left text-sm font-medium">
                                        <div>
                                            <x-dropdown align="right" width="64">
                                                <x-slot name="trigger">
                                                    <button class="flex items-center text-xs md:text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                        <div class="flex items-center text-left">
                                                            <x-icon name="person" />
                                                            {{ $contactMessage->author->name }}
                                                        </div>
                                                    </button>
                                                </x-slot>

                                                <x-slot name="content">
                                                    <x-dropdown-profile name="Email">
                                                        {{ $contactMessage->author->email }}
                                                    </x-dropdown-profile>
                                                    <x-dropdown-profile name="Building">
                                                        {{ ucwords($contactMessage->author->building->name) }}
                                                    </x-dropdown-profile>
                                                </x-slot>
                                            </x-dropdown>
                                        </div>
                                    </td>
                                    <td class="px-1 md:px-3 py-3 text-xs md:text-sm font-medium text-center">
                                        @if ( $contactMessage->answered == 0)
                                            No
                                        @else
                                            Yes
                                        @endif
                                    </td>
                                    <td class="px-1 md:px-3 py-3 text-right text-xs md:text-sm font-medium">
                                        <a href="{{ route('admin.contactMessages.edit', $contactMessage->slug) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>
                                    <td class="px-1 md:px-3 py-3 text-right text-xs md:text-sm font-medium">
                                        <x-form.layout action="{{ route('admin.contactMessages.delete', $contactMessage->slug) }}" method="DELETE">

                                            <button class="text-xs text-red-500">
                                                <x-icon name="delete" />
                                            </button>

                                        </x-form.layout>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $contactMessages->links() }}

                @else
                    <p class="text-center">No messages yet. Please check back later</p>
                @endif
                </div>
            </div>
            </div>
    </x-page-content-container>
</x-app-layout>
