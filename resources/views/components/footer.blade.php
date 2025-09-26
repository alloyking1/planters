<div>
    {{-- this should not show on the home page but on every other page --}}
    @if (!request()->is('/'))
    <x-blog.pages.section color="black" title="" textColor="white" textSize="large">
        <x-blog.pages.grid-1 class="text-center w-full">
            {{-- <x-blog.text.text color="white" class="" textSize="medium" value="Subscribe to Our Mailing List"/>
            <div class="">
                <x-blog.components.email-list/>
            </div> --}}

            <div class="max-w-4xl mx-auto">
                {{-- <x-blog.text.text color="white" class="font-bold" textSize="small" value="The process will be drop-dead simple, and you will be shocked by the quality and volume of responses you will get by posting on Laraveldev.pro"/> --}}

               <div class="gird grid-cols-1 place-content-center">
                {{-- <div class="flex justify-center md:gap-12 gap-4 text-gray-500 py-4">
                        <div class="text-xl">
                            <a href="{{ route('jobs.all') }}" class="text-gray-500 hover:text-gray-300" wire:navigate>Jobs</a>    
                        </div>
                        <div class="text-xl">
                            <a href="{{ route('agency.all') }}" class="text-gray-500 hover:text-gray-300" wire:navigate>Consultants</a>    
                        </div>
                        <div class="text-xl">
                            <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-300" wire:navigate>Blog</a>    
                        </div>
                </div> --}}
                <div class="text-gray-500">
                    Built by <a href="https://codecontent.pro" target="_blank" class="hover:text-gray-300 text-indigo-200">codecontent.pro</a> in partnership with {{ env('APP_NAME') }}
                    <div>
                        © {{ '20'. date('y') }} {{ env('APP_NAME') }}
                    </div>
                </div>
               </div>
            </div>
        </x-blog.pages.grid-1>
    </x-blog.pages.section>
    @endif
</div>