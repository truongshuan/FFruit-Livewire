@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#f28123]
focus:ring-[#f28123] rounded-md shadow-sm']) !!}>
