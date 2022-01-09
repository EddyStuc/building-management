<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Contact Messages')  }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 flex">
        <div class="mx-auto px-4">
            <div class="bg-white shadow-sm rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
                            @if ($contactMessages->count())
                                <div class="mb-4 shadow overflow-hidden border-b border-gray-200 rounded-lg">
                                    <table class="divide-y divide-gray-200">
                                        <thead class="bg-blue-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    Subject
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    Created By
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    Answered
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
                                        @foreach ( $contactMessages as $contactMessage )
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-semibold text-gray-900 hover:text-blue-400">
                                                        <a href="{{ route('admin.contactMessages.show', $contactMessage->slug) }}">
                                                            {{ $contactMessage->subject }}
                                                        </a>
                                                    </div>
                                                </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                    <div>
                                                        <x-dropdown align="right" width="64">
                                                            <x-slot name="trigger">
                                                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                                    <div class="flex">
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
                                                @if ( $contactMessage->answered == 0)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        No
                                                    </td>
                                                @else
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        Yes
                                                    </td>
                                                @endif
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('admin.contactMessages.edit', $contactMessage->slug) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
