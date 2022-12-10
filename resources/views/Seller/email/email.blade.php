@component('mail::message')
# {{ $details['title'] }}

Please click the link below to confirm your mail

@component('mail::button', ['url' => $details['url']])
Confirm Mail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent