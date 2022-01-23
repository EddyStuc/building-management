@props(['noticeboardPosts'])

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 mb-4">
    @foreach ($noticeboardPosts as $noticeboardPost)
        <x-noticeboardPost-card
        :noticeboardPost="$noticeboardPost"
        class="col-span-1 lg:col-span-2"
        />
    @endforeach
</div>
