@props(['noticeboardPost'])

<article
    {{ $attributes->merge(['class' => "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"]) }}>
    <div class="py-6 px-5">

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="mt-4">
                    <h1 class="text-3xl">
                       <a href="/noticeboard/{{ $noticeboardPost->slug }}">
                           {{ $noticeboardPost->title }}
                        </a>
                    </h1>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                    {!! $noticeboardPost->subject !!}
            </div>
        </div>
    </div>
</article>
