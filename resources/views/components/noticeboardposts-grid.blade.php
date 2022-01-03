@props(['noticeboardPosts'])

<div class="grid grid-cols-6 mb-4">
    @foreach ($noticeboardPosts as $noticeboardPost)
        <x-noticeboardPost-card
        :noticeboardPost="$noticeboardPost"
        class="col-span-2"
        />
    @endforeach
</div>
