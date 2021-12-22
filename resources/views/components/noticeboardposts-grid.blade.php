@props(['noticeboardPosts'])

@if ($noticeboardPosts->count() > 1)
   <div class="lg:grid lg:grid-cols-6">
      @foreach ($noticeboardPosts as $noticeboardPost)
         <x-noticeboardPost-card
         :noticeboardPost="$noticeboardPost"
         class="col-span-2"
         />
      @endforeach
   </div>
@endif
