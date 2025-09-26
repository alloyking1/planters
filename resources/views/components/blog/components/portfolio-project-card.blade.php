@props([
    'name',
    'description',
    'link' => '#',
    'image' => NULL,
    'projectId' => NULL,
    'userId'=> NULL,
    'useCase' => NULL
])

<div {{ $attributes->merge(['class' => 'w-full rounded-xs bg-white shadow-sm rounded-md p-4 pb-0 border border-gray-100 hover:border-gray-200']) }}>
        <div class="w-11/12 mx-auto pb-10">
            @if (auth()->check() && auth()->user()->id == $userId)
                @if ($useCase == 'services')
                    <div class="flex justify-end mb-2">
                        <span class="text-white rounded-full bg-red-600 p-1 px-3 hover:cursor-pointer" 
                            wire:click="deleteService({{ $projectId }})"
                            wire:confirm.prompt="Are you sure you want to delete this project?\n\nType DELETE to confirm|DELETE"
                        >x</span>
                    </div>
                @else
                    
                    <div class="flex justify-end mb-2">
                        <span class="text-white rounded-full bg-red-600 p-1 px-3 hover:cursor-pointer" 
                            wire:click="deleteProject({{ $projectId }})"
                            wire:confirm.prompt="Are you sure you want to delete this project?\n\nType DELETE to confirm|DELETE"
                        >x</span>
                    </div>
                @endif
            @endif
            <a href="{{ $link }}" target="_blank">

               
                    @if ($useCase == 'services')
                    <div class="">
                    @else
                    <div class="shadow rounded-lg border">
                        @if ($image == NULL)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-full h-[10rem]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>
                        @else
                        <img src="{{ asset('storage/' . $image) }}" class="w-full h-[10rem] rounded-md">
                        @endif
                    @endif
                </div>

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