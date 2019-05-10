@component('mail::message')
{{-- Greeting --}}
@component('mail::panel')
    List of Service Requests scheduled today, {{ $dt = date('M d, Y') }} {{PHP_EOL}}
@endcomponent
{{-- {{dd($posts)}} --}}
{{-- Intro Lines --}}
@component('mail::table')
| ID            | Category                  | Title                       | Requested By     |
| ------------- |:--------------------------|:----------------------------|:-----------------|
@foreach($posts as $post)
|{{$post->id}}  |{{$post->category_name}}   |{{$post->request_title}}     |{{$post->user_id}}|
@endforeach
@endcomponent
{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
This is an automated alert of the system, do not reply.  {{PHP_EOL}}
{{ config('app.name') }}
@endif

@endcomponent
