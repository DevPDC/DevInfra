@component('mail::message')
{{-- Greeting --}}
@component('mail::panel')
    Maintenance Alert, {{ $dt = date('M d, Y') }} {{PHP_EOL}}
    {{ date('M d, Y', strtotime($dt. ' - 4 days')) }} - {{ date('M d, Y', strtotime($dt. ' + 4 days')) }} {{PHP_EOL}}
@endcomponent
{{-- {{dd($posts)}} --}}
{{-- Intro Lines --}}
@component('mail::table')
| ID            | Name                      | Details                       | Infrastructure Type     |  Maintenance Schedule    |
| ------------- |:--------------------------|:------------------------------|:------------------------|:-------------------------|
@foreach($facilities as $facility)
|{{$facility->id}}  |{{$facility->name}}   |{{$facility->details}}     |{{$facility->infra_name}}|{{$facility->maintenance_schedule}}|
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
