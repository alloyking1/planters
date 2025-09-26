
@props(['title'=> null, 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'bg-white shadow-3xl rounded-2xl p-8 md:px-32 md:py-16']) }}>
    <div class="my-4">
        <h1 class="md:text-3xl text-4xl font-black">{{ $title }}</h1>
        <p class="text-gray-900 text-xs font-thin">{{ $subtitle }}</p>
    </div>
    {{ $slot }}
</div>