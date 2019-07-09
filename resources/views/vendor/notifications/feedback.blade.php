@component('mail::message')
        {{-- Greeting --}}

@component('mail::panel')
{{-- Intro Lines --}}
Good Day Ka-PhilRice! {{PHP_EOL}}
{{PHP_EOL}}
Thank you for using the <b>Intranet's PPD Service Request form</b>. Please tell us about your experience in this short survey. Your feedback helps us to create a better service for you and for all of our Ka-PhilRice clients.
@endcomponent

@component('mail::button', ['url' => 'https://forms.gle/3UhP88ZU1t9V4Zmx9', 'color' => 'green'])
    Take Survey
@endcomponent
{{-- Salutation --}}
@if (! empty($salutation))

{{ $salutation }}

@else

This is an auto-generated message, do not reply. {{PHP_EOL}}

@endif

@endcomponent
