
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <x-blog.components.card>
        <x-blog.components.flash-message message="{{ session('success') }}" class="my-2"/>
        <x-blog.components.flash-message message="{{ session('error') }}" status="error" class="my-2"/>
        <div x-data="{open:false, step: @entangle('step')}">
            
            <div class="flex justify-between">
                <div>
                    <h1 class="md:text-3xl text-4xl text-gray-700">Portfolios</h1>
                </div>
                <div> 
                    <div x-on:click="open = ! open">
                        <x-primary-button>
                            <div>Create Portfolio</div>
                        </x-primary-button>
                    </div>
                </div>
            </div>

            <div x-show="open">
                {{-- separate into different files and routes --}}
                @if ($this->step == 1)
                   <x-portfolio.step-one/>
                @endif
                @if ($this->step == 2)
                    <x-portfolio.step-two/>
                @endif
                @if ($this->step == 3)
                    <x-portfolio.step-three/>
                @endif
            </div>
        </div>
        
        <div>
            <x-blog.pages.grid-1 class="pt-4">
                @forelse ($portfolios  as $portfolio )
                <a href="{{ route('portfolio.edit',['id' => $portfolio->id]) }}" wire:navigate>
                    <x-portfolio.portfolio-list :portfolio="$portfolio"/>
                </a>
                @empty
                    <x-blog.components.card-long>
                        <x-blog.text.text textSize="xx-small" color="gray" value="Create a free portfolio website to get started!" class=""/>
                    </x-blog.components.card-long>
                @endforelse
                
            </x-blog.pages.grid-1>
        </div>
    </x-blog-components.card>
</div>