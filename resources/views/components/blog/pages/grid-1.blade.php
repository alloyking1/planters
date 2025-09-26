
@props([
    'cols' => 3
])

<div {{ $attributes->merge(['class' => 'grid grid-cols-1 gap-4'])->class([
]) }}>
    {{ $slot }}
</div>