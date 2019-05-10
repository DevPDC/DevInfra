@component('mail::message')
        {{-- Greeting --}}

    @component('mail::panel')
        Your Request of Service has been rendered
    @endcomponent

    {{-- Intro Lines --}}
    Request ID: {{ $postId }} {{PHP_EOL}}
    Title: {{ $postTitle }}



    {{-- Salutation --}}
    @if (! empty($salutation))

    {{ $salutation }}
    
    @else

    This is an automated alert of the system, do not reply. {{PHP_EOL}}
    {{ config('app.name') }}

    @endif

@endcomponent
