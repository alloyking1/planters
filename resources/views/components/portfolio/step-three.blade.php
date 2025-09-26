<div>
    <div class="py-4">
        <hr>
    </div>
    <form wire:submit="save">
        <div class="mt-6">
            <div class="grid md:flex md:justify-between gap-4">
                <div>
                    <label for="file" class="p-3 bg-blue-900 rounded-md px-4 hover:cursor text-white text-sm font-semibold">Add profile photo</label>
                    <x-text-input id="file" placeholder="Featured image" type="file" wire:model="profile_img" class="hidden mt-1 w-full" autofocus autocomplete="logo" />
                    <x-input-error :messages="$errors->get('profile_img')" class="mt-2" /> 
                        {{-- {{ $errors }} --}}
                </div>
                <div class="justify-end">
                    <div class="mt-4">
                        @if ($this->profile_img)
                            {{-- <div class="border rounded-full w-32 md:w-50 md:p-32 p-24"> --}}
                                <img src="{{ $this->profile_img->temporaryUrl() }}" class="rounded-full w-32">
                            {{-- </div> --}}
                        @else
                            <div class="border rounded-full w-32 md:w-50 md:p-32 p-24"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4">
            <hr>
        </div>

        {{-- <div class="mt-6">
            <div class="grid md:flex md:justify-between gap-4">
                <div>
                    <label for="file" class="p-3 bg-blue-900 rounded-md px-4 hover:cursor text-white text-sm font-semibold">Add CV</label>
                    <x-text-input id="file" placeholder="Featured image" type="file" wire:model="cv" class="hidden mt-1 w-full" autofocus autocomplete="logo" />
                    <x-input-error :messages="$errors->get('cv')" class="mt-2" /> 
                </div>
                <div class="justify-end">
                    <div class="mt-4">
                        @if ($this->cv) 
                            <img src="{{ $this->cv->temporaryUrl() }}" class="border rounded-md w-32 md:w-50 md:p-32 p-24">
                        @else
                            <div class="border rounded-md w-32 md:w-50 md:p-32 p-24"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4">
            <hr>
        </div> --}}
        <div class="mt-4 flex justify-between"> 
            <x-primary-button class="bg-green-500" wire:click="save">
                save
            </x-primary-button>
            <x-primary-button class="bg-green-500" wire:click="save">
                publish
            </x-primary-button>
        </div>
    </form>
</div>