<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Contact Messages') }}
            </h2>
            <x-a-link-button :href="route('admin.contactMessages')">
                <x-icon name="left-arrow" />
                Back to admin messages
            </x-a-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                            <div class="flex items-center lg:justify-center text-sm mt-4">
                                <div class="ml-3 text-left">
                                    <h5 class="font-bold mb-2">
                                        {{ $contactMessage->name }}
                                    </h5>
                                    <h5 class="font-bold mb-2">
                                        {{ $contactMessage->author->email }}
                                    </h5>
                                    <h5 class="font-bold mb-2">
                                        {{ $contactMessage->phone }}
                                    </h5>
                                    <p class="text-gray-400 text-xs">
                                        Published <time>{{ $contactMessage->created_at->diffForHumans() }}</time>
                                    </p>
                                </div>
                            </div>



                        </div>

                        <div class="col-span-8">
                            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                                {{ $contactMessage->subject }}
                            </h1>

                            <div class="space-y-4 lg:text-lg leading-loose">
                                {!! nl2br($contactMessage->message) !!}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
