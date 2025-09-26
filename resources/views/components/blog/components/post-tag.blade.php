
@props([
    'text',
    'color'
])

<span {{ 
    $attributes->merge(['class' => 
    'text-sm font-medium text-bold  mr-2 mb-2 px-2.5 pt-0.5 pb-0.5 rounded-full'
    ])->class([
    'bg-green-500 text-white' => $color === 'green',
    'bg-black text-gray-300' => $color === 'black',
    'bg-sky-700 text-white' => $color === 'sky',
    'bg-blue-500 text-white' => $color === 'blue',
    'bg-[#ea580c] text-white' => $color === 'orange',
]) }}>
        {{ $text }}
    
</span>