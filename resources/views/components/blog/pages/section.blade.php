@props([
    'color',
    'textColor' => null,
    'textSize' => null,
    'title' => null,
    'sub-title'=> null
])

<div {{ $attributes->merge(['class' => 'h-auto md:p-32 p-12'])->class([
    // 'bg-black' => $color === 'black', 
    'bg-[linear-gradient(to_right,_#040519,_#040416,_#030313,_#030310,_#02020c,_#02020d,_#02030f,_#020310,_#030416,_#04051b,_#040720,_#030825)]' => $color === 'black', 
    'bg-gray-100' => $color === 'offWhite',
    'bg-white' => $color === 'white',
    'bg-gray-200' => $color === 'gray',
    'bg-gray-50' => $color === 'lightGray',
    'bg-[rgb(240 250 249/var(--tw-bg-opacity))]' => $color === 'green',
    
    'bg-[#020811]' => $color === 'blue',
]) }}>
    <div {{ $attributes->when($title)->merge(['class' => 'font-bold']) }}>
        <x-blog.text.text :color="$textColor" :textSize="$textSize" :value="$title"/>
    </div>
 {{ $slot }}
</div>