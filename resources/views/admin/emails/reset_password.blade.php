@component('mail::message')
# Reset Password
Welcome {{$data['data']->name}}


The body of your message.


@component('mail::button', ['url' => aurl('reset/password/'. $data['token']) ])
Click Here To Reset Your Password
@endcomponent
Or <br>
Copy This Link
<a href="aurl('reset/password/'. $data['token'])">{{aurl('reset/password/'. $data['token'])}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
