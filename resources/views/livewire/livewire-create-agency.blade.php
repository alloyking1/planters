<x-blog.components.card>
    
    <div x-data={open:false}>
        <x-blog.components.flash-message status="{{ session('success') }}"/>
        <div class="flex justify-between py-4">
            <div>
                <h1 class="md:text-3xl text-4xl text-gray-700">Agency</h1>
            </div>
            <div> 
                <div x-on:click="open = ! open">
                    <x-primary-button>
                        <div>Add agency</div>
                    </x-primary-button>
                </div>
            </div>
        </div>

        <div x-show="open">
            <form wire:submit="save">

                <div class="mt-4 grid grid-cols-3 gap-2">
                    <div class="mt-1">
                        <x-text-input wire:model="form.name" placeholder="Organization Name" class="block mt-1 w-full" type="text" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                    </div>
                    <div class="mt-1">
                        <x-text-input wire:model="form.email" placeholder="Work Email" class="block mt-1 w-full" type="email" autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                    </div>
                    <div class="mt-2">
                            <select wire:model="form.type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="">
                                <option value="" disabled selected hidden>Consultant type</option>
                                @foreach (App\Enums\AgencyTypeEnum::cases() as $item)
                                    <option value="{{ $item }}"> {{ $item }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('form.type')" class="" />
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-3 gap-2">
                    <div class="mt-1">
                    
                            <select wire:model="form.headquarters" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="">
                                <option value="" disabled selected hidden>Company headquaters</option>
                                @foreach (App\Enums\ContinentEnum::cases() as $item)
                                    <option value="{{ $item }}"> {{ $item }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('form.headquarters')" class="" />
                    </div>
                    <div class="mt-1">
                    
                            <select wire:model="form.size" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="">
                                <option value="" disabled selected hidden>Company size</option>
                                @foreach (App\Enums\TeamSizeEnum::cases() as $item)
                                    <option value="{{ $item }}"> {{ $item }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('form.size')" class="" />
                    </div>
                    <div class="mt-1">
                        
                            <select wire:model="form.project_size" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                <option value="" disabled selected hidden>Minimum Project Size</option>
                                @foreach (App\Enums\ProjectSizeEnum::cases() as $projectSize)
                                    <option value="{{ $projectSize }}"> {{ $projectSize }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('form.project_size')" class="" />
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-2">
                    <div class="mt-1">
                        <x-text-input placeholder="Website link" class="block mt-1 w-full" type="text" wire:model="form.website"  autofocus autocomplete="website" />
                        <x-input-error :messages="$errors->get('form.website')" class="mt-2" />
                    </div>
                    <div class="mt-1">
                        <x-text-input placeholder="Video link (optional)" class="block mt-1 w-full" type="text" wire:model="form.video" autofocus autocomplete="video" />
                        <x-input-error :messages="$errors->get('form.video')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-4">
                    <textarea placeholder="Short description" wire:model="form.short_description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" cols="80" type="text"></textarea>
                    <x-input-error :messages="$errors->get('form.short_description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <textarea placeholder="About" wire:model="form.about_company" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="6" cols="80" type="text"></textarea>
                    <x-input-error :messages="$errors->get('form.about_company')" class="mt-2" />
                </div>

                <div class="mt-4 grid grid-cols-1 gap-2">
                    <x-multi-select-dropdown list="skills" selectedOptions="selectedOptions">
                        <x-input-error :messages="$errors->get('form.selectedOptions')" class="mt-2" /> 
                    </x-multi-select-dropdown>
                </div>

                <div class="mt-4">
                    <div class="grid gap-4">
                        <div>
                            <label for="file" class="p-3 bg-blue-900 rounded-md px-4 hover:cursor text-white text-sm font-semibold">Add a logo</label>
                            <x-text-input id="file" placeholder="Featured image" type="file" wire:model="logo" class="hidden mt-1 w-full" autofocus autocomplete="logo" />
                            <x-input-error :messages="$errors->get('form.feature_img')" class="mt-2" /> 
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
                    Add Agency
                </x-primary-button>
                </div>
            </form>

            <div class="p-4">
                <hr>
            </div>
        </div>
    </div>
    

    <div>
        <x-blog.pages.grid-1 class="pt-4">
            @forelse ($userAgency->agency  as $agency )
                <a href="{{ route('agency.update',['id' => $agency->id]) }}" wire:navigate>
                    <x-blog.components.agency-card :agency="$agency"/>
                </a>
            @empty
                <x-blog.components.card-long>
                    <x-blog.text.text textSize="xx-small" color="gray" value="Let the world see your agency!" class=""/>
                </x-blog.components.card-long>
            @endforelse
            
        </x-blog.pages.grid-1>
    </div>
</x-blog-components.card>