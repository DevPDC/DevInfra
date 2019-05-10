@component('mail::message')
        {{-- Greeting --}}

    @component('mail::panel')
        You've successfully submitted your request.
    @endcomponent

    {{-- Intro Lines --}}
    You can track the progress of your request by entering this ticket number "{{ $ticket }}" on the tracking form provided by the system.

    {{-- Salutation --}}
    @if (! empty($salutation))

    {{ $salutation }}
    
    @else

    This is an automated alert of the system, do not reply. {{PHP_EOL}}
    {{ config('app.name') }}

    @endif

@endcomponent
