@component('mail::message')
Hi {{$data['friend_name']}}, {{$data['your_name']}}
is sending you this Job

@component('mail::button', ['url' => $data['jobURL']])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
