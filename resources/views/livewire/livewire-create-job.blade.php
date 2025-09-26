
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <x-blog.components.card>
            <div x-data={open:false}>
            <x-blog.components.flash-message status="{{ session('success') }}"/>

            <div class="flex justify-between">
                <div>
                    <h1 class="md:text-3xl text-4xl text-gray-700">Jobs</h1>
                </div>
                <div> 
                    <div x-on:click="open = ! open">
                        <x-primary-button>
                            <div>Add job</div>
                        </x-primary-button>
                    </div>
                </div>
            </div>

            <div x-show="open">
                <form>
                    <div class="mt-4 grid grid-cols-2 gap-2">
                        <div class="mt-1">
                            <x-text-input wire:model="form.company_name" placeholder="Company Name" class="block mt-1 w-full" type="text" autofocus autocomplete="form.company_name" />
                            <x-input-error :messages="$errors->get('form.company_name')" class="mt-2" />
                        </div>
                        <div class="mt-1">
                            <x-text-input wire:model="form.title" placeholder="Job title" class="block mt-1 w-full" type="text" autofocus autocomplete="form.title" />
                            <x-input-error :messages="$errors->get('form.title')" class="mt-2" />
                        </div>                  
                    </div>

                    <div class="mt-1 grid grid-cols-2 gap-2">
                        <div class="mt-1">
                            <x-text-input wire:model="form.contract" placeholder="Contract" class="block mt-1 w-full" type="text" autofocus autocomplete="form.contract" />
                            <x-input-error :messages="$errors->get('form.contract')" class="mt-2" />
                        </div>
                        <div class="mt-1">
                            <x-text-input wire:model="form.location" placeholder="location" class="block mt-1 w-full" type="text" autofocus autocomplete="form.location" />
                            <x-input-error :messages="$errors->get('form.location')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <textarea placeholder="Job description" wire:model="form.description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" cols="80" type="text"></textarea>
                        <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <textarea placeholder="About company" wire:model="form.about_company" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="6" cols="80" type="text"></textarea>
                        <x-input-error :messages="$errors->get('form.about_company')" class="mt-2" />
                    </div>


                    <div class="mt-2 grid grid-cols-2 gap-2">
                        <div class="mt-1">
                            <x-text-input wire:model="form.salary" placeholder="$50,000 - $150,000" class="block mt-1 w-full" type="text" autofocus autocomplete="form.salary" />
                            <x-input-error :messages="$errors->get('form.salary')" class="mt-2" />
                        </div>
                        <div class="mt-1">
                            <x-text-input wire:model="form.application_link" placeholder="Job application link" class="block mt-1 w-full" type="text" autofocus autocomplete="job.application_link" />
                            <x-input-error :messages="$errors->get('form.application_link')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-2 grid grid-cols-1 gap-2">
                        <div class="mt-1">
                            <x-multi-select-dropdown list="skills" selectedOptions="selectedOptions">
                                <x-input-error :messages="$errors->get('form.selectedOptions')" class="mt-2" /> 
                            </x-multi-select-dropdown>
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="grid gap-4">
                            <div>
                                <label for="file" class="p-3 bg-blue-900 rounded-md px-4 hover:cursor text-white text-sm font-semibold">Add a logo</label>
                                <x-text-input id="file" placeholder="Featured image" type="file" wire:model="logo" class="hidden mt-1 w-full" autofocus autocomplete="logo" />
                                <x-input-error :messages="$errors->get('form.logo')" class="mt-2" /> 
                            </div>
                            <div>
                                @if ($logo) 
                                    <img src="{{ $logo->temporaryUrl() }}" class="w-[6rem]">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 flex justify-between"> 
                    <x-primary-button class="bg-green-500" wire:click.prevent="save">
                        Post Job
                    </x-primary-button>
                    </div>
                </form>
                <div class="py-4">
                    <hr>
                </div>
            </div>
        </div>
            
            <div>
                <x-blog.pages.grid-1 class="pt-4">
                    @forelse ($userJobs->jobs  as $jobs )
                    <a href="{{ route('jobs.update',['id' => $jobs->id]) }}" wire:navigate>
                        <x-blog.components.job-card :job="$jobs"/>
                    </a>
                    @empty
                        <x-blog.components.card-long>
                            <x-blog.text.text textSize="xx-small" color="gray" value="Let the world see your Job!" class=""/>
                        </x-blog.components.card-long>
                    @endforelse
                    
                </x-blog.pages.grid-1>
            </div>
        </x-blog-components.card>
</div>