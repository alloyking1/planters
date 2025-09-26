
@props([
    'cols' => 3
])

<div {{ $attributes->merge(['class' => 'grid md:grid-cols-3 gap-3'])->class([
]) }}>
    {{ $slot }}
</div>