@props(['active' => false])
<a {{ $attributes }} class="relative py-2 px-4 transition duration-300 cursor-pointer  group " wire:navigate>
    <span class="group-hover:text-light-green {{ $active ? 'text-white' : ''}}">  {{ $slot }} </span>
    <span class="absolute left-[53%] -bottom-2 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full group-hover:right-0 transform -translate-x-1/2 {{ $active ? 'w-[100%] h-0.5' : '' }}"></span>
</a>
