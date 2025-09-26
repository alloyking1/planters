<x-guest-layout>
    <div>
        <x-blog.seo.page-meta
        title="Laraveldev.pro"
        description="providing laravel coding tutorials for laravel developers "
        keywords="laravel,coding,tallstack,livewire,laraveldeveloper,laravel jobs, laravel news"
        robots="laravel,coding,tallstack,livewire,laraveldeveloper,laravel jobs, laravel news"
        />



        <x-blog.pages.section color="black" textColor="white" textSize="large" class="relative">
            <div class="">
                <x-blog.pages.grid-2 class="">
    
                    <div class="">
                        <img src="{{ asset('storage/' . $agency->feature_img) }}" alt="">
                    </div>
    
                    <div class="text-center grid place-content-center justify-center">
                        <x-blog.text.text textSize="header2" color="white" :value="$agency->name" class="font-black"/>
                
                        <div class="max-w-2xl mx-auto mt-4">
                            <x-blog.text.text textSize="x-small"
                            color="white"
                            class="font-thin"
                            :value="$agency->short_description"/>
                            <x-blog.components.post-tag :text="$agency->headquarters" :color="array_rand(['sky' => 'sky', 'green' => 'green', 'orange' => 'orange', 'blue' => 'blue'], 1)"/>
                            <x-blog.components.post-tag :text="$agency->project_size.' +'" :color="array_rand(['sky' => 'sky', 'green' => 'green', 'orange' => 'orange', 'blue' => 'blue'], 1)"/>
                        </div>
                        <div class="mt-4">

                            <a
                            href="{{ $agency->website }}"
                            class="py-3 text-base font-medium px-7 text-dark dark:text-black hover:text-primary -mr-4"
                            >
                          <x-primary-button>Visit {{ $agency->name }}</x-primary-button>
                          </a>
                        </div>
                    </div>
    
                    
                </x-blog.pages.grid-2>
            </div>
        </x-blog.pages.section>
        
        <x-blog.pages.section color="black" title="" textColor="white" textSize="large">
            <div class="text-white md:-mt-20 -mt-16">
                <h2 class="text-2xl font-thin text-white">
                    {{ $agency->about_company }}
                </h2>
            </div>
            <div class="mt-3">
                <a
                href="{{ $agency->website }}"
                class=""
                >
                <x-primary-button class="p-6" style="padding:2rem;">Visit {{ $agency->name }}</x-primary-button>
                </a>
            </div>
        </x-blog.pages.section> 
    </div>
    
</x-guest-layout>
