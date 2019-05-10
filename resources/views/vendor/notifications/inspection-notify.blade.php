@component('mail::message')

{{-- Greeting --}}
@component('mail::panel')
    Ocular Inspection Completed
@endcomponent

{{-- Intro Lines --}}
Your Request with the following details has been inspected: {{ PHP_EOL }} 
-ID: {{ $postId }} {{ PHP_EOL }}  
-Title: {{ $postTitle }}) {{ PHP_EOL }}
 {{ PHP_EOL }} 
{{ PHP_EOL }}
You can view the details of the said inspection thru PPDIS system.

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}

@else
This is an automated alert of the system, do not reply. {{PHP_EOL}}
{{ config('app.name') }}
@endif

@endcomponent
