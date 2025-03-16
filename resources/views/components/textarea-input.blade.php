@props(['disabled' => false,'value'=>''])

<textarea   {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' from-control']) !!}>{{$value}}</textarea>
