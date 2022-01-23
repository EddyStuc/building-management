<x-app-layout>
    <x-slot name="header">
        <x-page-header-container>
            <h2 class="hidden md:inline-block font-semibold text-xl text-gray-800">
                {{ __('Building Reports')  }}
            </h2>

            <x-form.layout method="GET" action="{{ route('reports') }}">
                <x-form.search />
            </x-form.layout>

            <div class="mt-2 md:mt-0 text-right">
                <x-a-link-button :href="route('reports.create')">
                    Create new report
                </x-a-link-button>
            </div>
        </x-page-header-container>
    </x-slot>

    <x-page-content-container>
        <div class="flex flex-col">
            <div class="overflow-x-auto lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full px-2 lg:px-8">
                @if ($reports->count())
                    <div class="mb-4 shadow overflow-hidden border-b border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-blue-400">
                                <tr>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col" class="hidden md:table-cell px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Subject
                                </th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Created By
                                </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($reports as $report)
                                <tr>
                                    <td class="px-3 py-4">
                                    <div class="flex items-center">
                                        <div class="text-sm font-semibold text-gray-900 hover:text-blue-400">
                                            <a href="{{ route('reports.show', $report->slug) }}">
                                                {{ $report->title }}
                                            </a>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="hidden md:table-cell px-3 py-4">
                                        <div class="text-sm text-gray-900">
                                        {{ $report->subject }}
                                        </div>
                                    </td>

                                    <td class="px-3 py-4 text-left text-sm">
                                        {{ $report->author->name}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $reports->links() }}

                @else
                    <p class="text-center">No reports yet. Please check back later</p>
                @endif
                </div>
            </div>
        </div>
    </x-page-content-container>
</x-app-layout>
