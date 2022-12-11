@component('mail::message')
# {{ $details['title'] }}


Hello {{$details['name']}}.<br>
You have forgotten your password. For your request we reset your passowrd.<br>Your password new is: <b style="color: red">{{$details['password']}}</b><br>
You can change passowrd from Security at anytime.

@component('mail::button', ['url' => $details['url']])
Click Here To Login
@endcomponent

Thanks,<br>
RMG Solution
@endcomponent