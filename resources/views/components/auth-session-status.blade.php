@props(['status'])

@if ($status)
    <div id="form-messages" {{ $attributes->merge(['class' => '']) }}>
        {{ $status }}                                     
    </div> 
@endif
