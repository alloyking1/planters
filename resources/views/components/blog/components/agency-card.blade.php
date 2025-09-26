@props([
    'agency'
])

{{-- <a href="{{ route('agency.show', $agency) }}" target="_blank" class="text-black"> --}}
    <x-blog.components.card-long>

        <div class="">
            <div class="flex">
                <div class="hidden md:block bg-white shadow rounded-lg border p-4 -ml-[3rem] mr-3">
                    @if ($agency->feature_img == NULL)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-[40px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                    @else
                    <img src="{{ asset('storage/' . $agency->feature_img) }}" class="w-[3rem]">
                    @endif
                </div>
                <div class="grid grid-cols-1 w-full">
                    <div class="md:flex justify-between mb-2 md:mb-0">
                        <div>
                            <x-blog.text.text textSize="small" color="black" class="font-bold" :value="$agency->name"/>
                        </div>
                        <div>
                            <span class="text-base font-medium">Project from: {{ $agency->project_size }} 
                        </div>
                    </div>
                    <div class="font-thin">
                        {{ Str::limit($agency->about_company, 150, '... See more') }}
                    </div>
                </div>
            </div>
        </div>
    </x-blog.components.card-long>
{{-- </a> --}}



