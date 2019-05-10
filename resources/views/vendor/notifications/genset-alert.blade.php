@component('mail::message')
        {{-- Greeting --}}

    @component('mail::panel')
    Alert: The {{ $gensetname }} have reached the maximum hours of operation.
    @endcomponent

    {{-- Intro Lines --}}
    The {{ $gensetname }} with an id {{ $gensetid }} have reached its maximum operation hours '{{ $gensetcapacity }}', {{PHP_EOL}}
    Current Reading: {{ $gensethours }} {{PHP_EOL}}

    {{-- Salutation --}}
    @if (! empty($salutation))

    {{ $salutation }}
    
    @else

    This is an automated alert of the system, do not reply. {{PHP_EOL}}
    {{ config('app.name') }}

    @endif

@endcomponent
