@props(['icon', 'title', 'url' => '#', 'active' => false])
<li
    class="group text-white transition-colors border-card hover:bg-badge hover:border-b-2 hover:border-sky-500 first:hover:rounded-l-lg">
    <a href="{{ $url }}" class="flex py-6 px-6 gap-x-1.5 items-center">
        {{ $icon }}
        <span>{{ $title }}</span>
    </a>
</li>
