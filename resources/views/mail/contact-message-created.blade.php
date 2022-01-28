@component('mail::message')
# Contact Message Created

A Contact Message was created with the name **{{ $contactMessage->subject }}**
from **{{ $contactMessage->name }}**

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/contactMessages/' . $contactMessage->slug])
View Message on site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
