
@props([
    'cols' => 3
])

<div {{ $attributes->merge(['class' => 'grid md:grid-cols-2 gap-4'])->class([
]) }}>
    {{ $slot }}
</div>