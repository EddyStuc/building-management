<x-guest-layout>

        <div class="flex flex-col text-left mx-6">
            <h1 class="text-4xl lg:text-6xl mb-6">
                <span class="">A simple solution to</span>
                <span class="text-blue-400">building management.</span>
            </h1>
            <p class="mb-6 ">
                A fast and easy way to look after your building. Report issues, contact the management team, see up-coming scedules for your building such as fire-alarm
                testing and everything else that comes with keeping your building at the highest quality.
            </p>

            <div class="flex space-x-8">
                <x-a-link-button :href="route('login')">
                    Log in
                </x-a-link-button>
                <x-a-link-button :href="route('register')" class="">
                    Register
                </x-a-link-button>
            </div>
        </div>

</x-guest-layout>
