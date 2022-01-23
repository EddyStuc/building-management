@props(['noticeboardPost'])

<article
    {{ $attributes->merge(['class' => "my-2 mx-2 transition-colors text-white duration-300 bg-blue-300 shadow hover:bg-blue-500 border border-black border-opacity-0 hover:border-opacity-5 rounded-lg"]) }}>
        <div class="flex flex-col py-6 px-5 ">
            <header>
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold border-b-2">
                       <a href="{{ route('noticeboard.show', $noticeboardPost->slug) }}">
                           {{ $noticeboardPost->title }}
                        </a>
                    </h1>
                </div>
            </header>

            <div class="text-lg font-semibold mt-4 space-y-4">
                    {{ $noticeboardPost->subject }}
            </div>
            <div class="flex justify-end text-sm mt-4 space-y-4">
                {{ $noticeboardPost->author->name }}
            </div>
        </div>
</article>
