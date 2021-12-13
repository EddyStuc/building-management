@props(['noticeboardposts'])

{{-- <x-post-featured-card :post="$posts[0]" /> --}}

@if ($noticeboardposts->count() > 1)
   <div class="lg:grid lg:grid-cols-6">
      @foreach ($noticeboardposts as $noticeboardpost)
         <x-noticeboardpost-card
         :noticeboardpost="$noticeboardpost"
         class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
         />
      @endforeach
   </div>
@endif
