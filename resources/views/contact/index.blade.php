<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Contact Management')  }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 bg-white border-b border-gray-200">
                    <div class="w-1/3 mx-2 bg-gray-100 rounded-2xl shadow-lg">
                        <div class="m-2 py-2">
                            <h2>Company Name:</h2>
                            <p>XXXXXX Management Services</p>
                        </div>
                        <div class="m-2 py-2">
                            <h2>Phone:</h2>
                            <p>01752 XXXXXX</p>
                            <x-icon name="phone" />
                        </div>
                        <div class="m-2 py-2">
                            <h2>Address:</h2>
                            <p>40 Fore Street</p>
                            <p>Plymouth</p>
                            <p>PlX XXX</p>
                            <x-icon name="location" />
                        </div>
                        <div class="m-2 py-2">
                            <h2>Email:</h2>
                            <p>management@services.example</p>
                            <x-icon name="email" />
                        </div>
                    </div>
                    <div class="mx-2 p-4 w-1/3 bg-blue-100 rounded-2xl shadow-lg">
                        <h1 class="font-semibold">Send us a message!</h1>

                        <div>
                            <x-form.layout action="{{ route('contact') }}">

                                <x-form.input name="name" />
                                <x-form.input name="phone" />
                                <x-form.input name="subject" />
                                <x-form.input name="slug" />
                                <x-form.textarea name="message" />

                                <x-button>Submit</x-button>
                            </x-form.layout>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
