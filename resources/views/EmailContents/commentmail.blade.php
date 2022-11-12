<x-mail::message>
Your Chirp:{{$chirp}}
The Comment:{{$comment}}

<x-mail::button :url={{$url}}>
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
