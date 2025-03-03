@props(['active' => false])
<li>
    <a class="flex items-center gap-x-3 py-2 px-2.5  text-sm text-gray-700 rounded-lg hover:bg-gray-100 {{ $active ? 'bg-primary/5 text-primary' : '' }}"{{ $attributes }} >
        {{ $slot  }}
    </a>
</li>
