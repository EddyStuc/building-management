<x-app-layout>
    <x-slot name="header">
        <x-page-header-container>
            <h2 class="hidden md:inline-flex whitespace-nowrap font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Building Report') }}
            </h2>
            <div class="flex space-x-2 w-full justify-between md:justify-end">
                <x-a-link-button :href="route('reports')">
                    <x-icon name="left-arrow" />
                    Back to reports
                </x-a-link-button>
                <x-a-link-button :href="route('reports.create')">
                    Create new report
                </x-a-link-button>
            </div>
        </x-page-header-container>
    </x-slot>

    <x-page-content-container>

        @allowEdit(Auth::user(), $report)
            <div class="flex w-full justify-end">
                <x-a-link-button href="{{ route('reports.edit', $report->slug) }}">
                    Edit your report
                </x-a-link-button>
            </div>
        @endallowEdit

        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 mt-4">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $report->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            {{ $report->author->name }}
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $report->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    {!! nl2br($report->body) !!}
                </div>
            </div>
            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include('reports._add-comment')

                @foreach ($report->comments->reverse() as $comment)
                    <x-post-comment  :comment="$comment" />
                @endforeach
            </section>
        </article>
    </x-page-content-container>
</x-app-layout>
