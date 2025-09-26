<div>
    {{-- <x-portfolio.steps/> --}}
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
                <div class="justify-end">
                    <x-primary-button class="bg-green-500">
                        Add project
                    </x-primary-button>
                </div>
            </div>
        </div>
    </form>
    <div class="mt-4 flex justify-between"> 
        <x-primary-button class="bg-green-500" wire:click="save">
            Continue
        </x-primary-button>
    </div>
    <div class="py-4">
        <hr>
    </div>
</div>