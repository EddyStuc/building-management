<form action="/reports/{{ $report->slug }}/comments" method="POST">
    @csrf

    <header class="flex items-center">
        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">

        <h2 class="ml-4">Comment</h2>
    </header>

    <x-form.field>

        <textarea name="body"
                class="w-full text-sm focus:outline-none focus:ring"
                rows="5"
                placeholder="Enter your comment here."
                required></textarea>

        <x-form.error name="body" />
    </x-form.field>

    <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
        <x-button>Post</x-button>
    </div>
</form>


