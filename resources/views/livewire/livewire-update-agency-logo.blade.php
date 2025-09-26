<div>
    <x-blog.components.flash-message :message="session('success')" status="success"/>
    <div class="grid gap-4">
       
        <div>
            @if ($photo) 
                <img src="{{ $photo->temporaryUrl() }}" class="w-[6rem]">
            @else
                <img src="{{ asset('storage/' . $currentLogo) }}" class="w-[6rem]">
            @endif
        </div>
    </div>

    <div class="mt-4">
        <form>
            @if($photo === null)
            <div>
                <label for="file" class="p-3 bg-blue-900 rounded-md px-4 hover:cursor text-white text-sm font-semibold">Change logo</label>
                <x-text-input id="file" placeholder="Featured image" type="file" wire:model="photo" class="hidden mt-1 w-full" />
                <x-input-error :messages="$errors->get('form.photo')" class="mt-2" /> 
            </div>
            @else
            <div>
                <x-primary-button class="bg-orange-500" wire:click.prevent="update">
                    Save
                </x-primary-button>
                
            </div>
            @endif
            
        </form>
    </div>
</div>
