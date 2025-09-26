
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <x-blog.components.card>
        <div x-data={open:false,projectOpen:false}>
            <x-blog.components.flash-message status="{{ session('success') }}"/>

            <div class="flex justify-between py-4">
                <div>
                    <h1 class="md:text-3xl text-4xl text-gray-700">Add your services (2)</h1>
                    <h2 class="text-gray-600 text-sm">Add services (eg:laravel development, vue.js dev, technical writing, )</h2>
                </div>
                <div> 
                    <div x-on:click="open =!open">
                        <x-primary-button>
                            <div>Add service</div>
                        </x-primary-button>
                    </div>
                </div>
            </div>

            <div x-show="open">
                <div>
                    <form wire:submit="addService">
                        <div class="mt-1 grid grid-cols-1 gap-2">
                            <div class="mt-1">
                                <x-text-input wire:model="stepTwoServiceForm.name" placeholder="Project name" class="block mt-1 w-full" type="text" autofocus autocomplete="stepTwoForm.name" />
                                <x-input-error :messages="$errors->get('stepTwoServiceForm.name')" class="mt-2" />
                            </div>
                        </div>
                
                        <div class="mt-4">
                            <textarea placeholder="About project" wire:model="stepTwoServiceForm.description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="6" cols="80" type="text"></textarea>
                            <x-input-error :messages="$errors->get('stepTwoServiceForm.description')" class="mt-2" />
                        </div>
                
                        <div class="mt-4 flex justify-between"> 
                            <x-primary-button class="bg-green-500">
                                Add service
                            </x-primary-button>
                            <a href="{{ route('portfolio.step-three.edit', ['id' => $this->id]) }}" wire:navigate class="font-bold text-green-400 border p-2 border-green-300 rounded-md">
                                Next >>
                             </a>
                        </div>
                    </form>
                    
                </div>
                <div>
                   
                    <x-blog.pages.grid-5 class="mt-4">
                        @foreach ($portfolio->services as $service)
                            <x-blog.components.portfolio-project-card 
                            :name="$service->name" 
                            :description="$service->description" 
                            :projectId="$service->id"
                            :userId="$portfolio->user_id"
                            useCase="services"
                            />
                        @endforeach
                    </x-blog.pages.grid-5>
                </div>
            </div>
            
            <div class="my-8">
                <hr>
            </div>


            <div class="flex justify-between py-4">
                <div>
                    <h1 class="md:text-3xl text-4xl text-gray-700">Add projects (2)</h1>
                    <h2 class="text-gray-600 text-sm">Add sample projects with live links</h2>
                </div>
                <div> 
                    <div x-on:click="projectOpen =!projectOpen">
                        <x-primary-button>
                            <div>Add projects</div>
                        </x-primary-button>
                    </div>
                </div>
            </div>

            <div x-show="projectOpen">
                <div>
                    <form wire:submit="addProject">
                        <div class="mt-1 grid grid-cols-2 gap-2">
                            <div class="mt-1">
                                <x-text-input wire:model="stepTwoForm.project_name" placeholder="Project name" class="block mt-1 w-full" type="text" autofocus autocomplete="stepTwoForm.name" />
                                <x-input-error :messages="$errors->get('stepTwoForm.project_name')" class="mt-2" />
                            </div>
                            <div class="mt-1">
                                <x-text-input wire:model="stepTwoForm.project_link" placeholder="Project link" class="block mt-1 w-full" type="text" autofocus autocomplete="stepTwoForm.greeting" />
                                <x-input-error :messages="$errors->get('stepTwoForm.project_link')" class="mt-2" />
                            </div>
                        </div>
                
                        <div class="mt-4">
                            <textarea placeholder="About project" wire:model="stepTwoForm.about_project" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="6" cols="80" type="text"></textarea>
                            <x-input-error :messages="$errors->get('stepTwoForm.about_project')" class="mt-2" />
                        </div>
                
                        <div class="mt-6">
                            <div class="flex justify-between gap-4">
                                <div>
                                    <label for="file" class="p-3 bg-blue-900 rounded-md px-4 hover:cursor text-white text-sm font-semibold">Add project image</label>
                                    <x-text-input id="file" placeholder="Featured image" type="file" wire:model="project_img" class="hidden mt-1 w-full" autofocus autocomplete="logo" />
                                    <x-input-error :messages="$errors->get('project_img')" class="mt-2" /> 
                                        <div class="mt-4">
                                            @if ($this->project_img) 
                                                <img src="{{ $this->project_img->temporaryUrl() }}" class="w-[6rem]">
                                            @endif
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-between"> 
                            <x-primary-button class="bg-green-500">
                                Add project
                            </x-primary-button>
                           <a href="{{ route('portfolio.step-three.edit', ['id' => $this->id]) }}" wire:navigate class="font-bold text-green-400 border p-2 border-green-300 rounded-md">
                                Next >>
                            </a>
                        </div>
                    </form>
                </div>

                <div>
                    <x-blog.pages.grid-5 class="mt-4">
                        @foreach ($portfolio->projects as $project)
                                
                            <x-blog.components.portfolio-project-card 
                            :name="$project->name" 
                            :description="$project->description" 
                            :link="$project->link" 
                            :image="$project->img" 
                            :projectId="$project->id"
                            :userId="$portfolio->user_id"
                            />
                        @endforeach
                    </x-blog.pages.grid-5>
                </div>
            </div>
            
        </div>
    </x-blog-components.card>
</div>