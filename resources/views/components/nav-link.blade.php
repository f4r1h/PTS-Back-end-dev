@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#F5A623] text-sm font-medium leading-5 text-white focus:outline-none focus:border-[#F5A623] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-400 hover:text-[#F5A623] hover:border-[#F5A623] focus:outline-none focus:text-[#F5A623] focus:border-[#F5A623] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
