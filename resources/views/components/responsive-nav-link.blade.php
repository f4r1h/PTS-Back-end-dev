@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#F5A623] text-start text-base font-medium text-[#F5A623] bg-[#1E222E] focus:outline-none focus:text-[#F5A623] focus:bg-[#272C39] focus:border-[#F5A623] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-400 hover:text-white hover:bg-[#1E222E] hover:border-[#F5A623] focus:outline-none focus:text-white focus:bg-[#1E222E] focus:border-[#F5A623] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
