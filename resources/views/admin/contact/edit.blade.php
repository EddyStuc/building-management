<x-app-layout>
    <x-slot name="header">
        <x-page-header-container>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit message')  }}
            </h2>
            <x-a-link-button :href="route('admin.contactMessages')">
                <x-icon name="left-arrow" />
                Back to admin messages
            </x-a-link-button>
        </x-page-header-container>
    </x-slot>

    <x-page-content-container>
        <x-form.layout action="{{ route('admin.contactMessages.update', $contactMessage->slug) }}" method="PATCH">

            <x-form.input name="name" :value="old('name', $contactMessage->name)" />
            <x-form.input name="phone" :value="old('phone', $contactMessage->phone)" />
            <x-form.input name="subject" :value="old('subject', $contactMessage->subject)" />

            <div class="flex mt-6">
                <x-form.label name="answered" />
                <div class="flex ml-2">
                    <x-form.radio  value="1" name="answered" labelName="yes" :contactMessage="$contactMessage"/>
                    <x-form.radio  value="0" name="answered" labelName="no" :contactMessage="$contactMessage"/>
                </div>
            </div>

            <x-form.textarea name="message">{{ old('message', $contactMessage->message) }}</x-form.textarea>

            <x-button>Update</x-button>

        </x-form.layout>
        <x-form.layout action="{{ route('admin.contactMessages.delete', $contactMessage->slug) }}" method="DELETE">

            <x-button>
                <x-icon name="delete"/>
            </x-button>

        </x-form.layout>
    </x-page-content-container>
</x-app-layout>
