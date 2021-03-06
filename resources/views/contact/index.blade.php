<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Contact Management')  }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto px-1">
            <div class="bg-white overflow-hidden mx-1 shadow-sm rounded-lg">
                <div class="flex flex-col md:flex-row items-center md:items-stretch justify-center p-1 md:p-6 bg-white border-b border-gray-200">
                    <div class="relative mx-2  md:pt-6 p-2 text-md lg:text-xl">
                        <div class="flex items-center m-2 py-2">
                            <x-icon name="phone" />
                            <p class="ml-4">01752 XXXXXX</p>
                        </div>
                        <div class="flex items-center m-2 py-2">
                            <x-icon name="location" />
                            <div>
                                <p class="ml-4">40 Fore Street</p>
                                <p class="ml-4">Plymouth</p>
                                <p class="ml-4">PlX XXX</p>
                            </div>
                        </div>
                        <div class="flex items-center m-2 py-2">
                            <x-icon name="email" />
                            <p class="ml-2">management@services.example</p>
                        </div>
                        <x-icon name="bubble" />
                    </div>
                    <div class="mx-2 p-4 w-full bg-blue-300 rounded-2xl shadow-xl">
                        <h1 class="font-semibold">Send us a message!</h1>

                        <div>
                            <x-form.layout action="{{ route('contact') }}">

                                <x-form.input name="name" />
                                <x-form.input name="phone" />
                                <x-form.input name="subject" />
                                <x-form.textarea name="message" />

                                <x-button class="bg-blue-500">Send Message</x-button>
                            </x-form.layout>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
