@props([
    'name',
    'description',
])

<div {{ $attributes->merge(['class' => 'w-full rounded-xs bg-white shadow-sm rounded-md p-4 pb-0 border border-gray-100 hover:border-gray-200']) }}>
        <div class="w-11/12 mx-auto pb-10">
            <a href="#" target="_blank">

                <h2 class="text-gray-900 text-xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 mt-3">
                    <span class="link link-underline link-underline-black text-black">{{ $name }}</span>
                </h2>

                <p class="text-gray-500 text-xs w-full break-words">
                    {{ $description }}
                </p>

                
            </a>
        </div>
</div>


<style>
	.link-underline {
		border-bottom-width: 0;
		background-image: linear-gradient(transparent, transparent), linear-gradient(#fff, #fff);
		background-size: 0 3px;
		background-position: 0 100%;
		background-repeat: no-repeat;
		transition: background-size .5s ease-in-out;
	}

	.link-underline-black {
		background-image: linear-gradient(transparent, transparent), linear-gradient(rgb(14, 8, 12), rgb(14, 9, 12))
	}

	.link-underline:hover {
		background-size: 100% 3px;
		background-position: 0 100%
	}
</style>