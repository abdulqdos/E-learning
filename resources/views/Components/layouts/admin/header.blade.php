@props(['a' => false, 'url' => null, 'label' => ''])

<header class="flex flex-row items-center justify-between p-3 bg-white rounded-md shadow-sm">
    <h2 class="font-semibold text-lg"> {{ $slot }} </h2>

    @if($a && $url)
        <a href="{{ $url }}" wire:navigate class="bg-primary hover:bg-primary/80 transition duration-300 text-white py-1 px-3 rounded-md">
            {{ $label }}
        </a>
    @endif
</header>
