
@props([
    'cols' => 3
])

<div {{ $attributes->merge(['class' => 'grid md:grid-cols-5 grid-cols-2 gap-3'])->class([
]) }}>
    {{ $slot }}
</div>