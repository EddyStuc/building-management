<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Noticeboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">

                            <p class="mt-4 block text-gray-400 text-xs">
                                Published <time>{{ $noticeboardpost->created_at->diffForHumans() }}</time>
                            </p>

                            <div class="flex items-center lg:justify-center text-sm mt-4">
                                <div class="ml-3 text-left">
                                    <h5 class="font-bold">
                                        {{ $noticeboardpost->author->name }}
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-8">
                            <div class="flex justify-between mb-6">
                                <a href="/noticeboard">

                                    Back to Noticeboard
                                </a>

                            </div>

                            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                                {{ $noticeboardpost->title }}
                            </h1>

                            <div class="space-y-4 lg:text-lg leading-loose">
                                {!! $noticeboardpost->body !!}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
