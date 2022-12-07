@component('mail::message')
# {{ $details['title'] }}


Click the link to valid your Email.

@component('mail::button', ['url' => $details['url']])
Click Here
@endcomponent

Thanks,<br>
RMG Solution
@endcomponent