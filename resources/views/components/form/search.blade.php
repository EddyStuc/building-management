<div class="flex">
    <input type="text"
    name="search"
    placeholder="Search.."
    class="placeholder-gray-400 font-semibold text-sm rounded mr-2"
    value="{{ request('search') }}"
    >
    <x-button class="-mt-0">
        <x-icon name="search" />
    </x-button>
</div>
