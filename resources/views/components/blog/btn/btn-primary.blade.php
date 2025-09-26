@props([
    'href' => '#',
    'text' => 'Create Post'
])
<div class="my-4 mb-12 ml-16">
    <a href="{{ $href }}" class="border border-black rounded-xl p-6">{{ $text }}</a>
</div>