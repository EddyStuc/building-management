@props(['noticeboardPost'])

<article
    {{ $attributes->merge(['class' => "my-2 mx-2 transition-colors duration-300 bg-gray-100 hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"]) }}>
    <div class="py-6 px-5">

        <div class="flex flex-col">
            <header>
                <div>
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
